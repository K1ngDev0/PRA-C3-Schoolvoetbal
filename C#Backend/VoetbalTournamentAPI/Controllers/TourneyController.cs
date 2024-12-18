using Microsoft.AspNetCore.Mvc;
using VoetbalTournamentAPI.Data;
using VoetbalTournamentAPI.Model;
using System;
using System.Collections.Generic;
using System.Linq;

namespace VoetbalTournamentAPI.Controllers
{
    [ApiController]
    [Route("api/[controller]")]
    public class TourneyController : ControllerBase
    {
        private readonly VoetbalTournamentDataContext _context;

        public TourneyController(VoetbalTournamentDataContext context)
        {
            _context = context;
        }

        [HttpGet]
        public IActionResult GetAllTourneys()
        {
            var tourneys = _context.Tourney.ToList();
            return Ok(tourneys);
        }

        [HttpGet("{id}")]
        public IActionResult GetTourneyById(int id)
        {
            var tourney = _context.Tourney.FirstOrDefault(t => t.Id == id);
            if (tourney == null)
            {
                return NotFound();
            }
            return Ok(tourney);
        }

        [HttpPost]
        public IActionResult CreateTourney([FromBody] Tourney newTourney)
        {
            if (_context.Tourney.Any())
            {
                return Conflict("A tourney already exists. Only one tourney is allowed.");
            }

            _context.Tourney.Add(newTourney);
            _context.SaveChanges();

            GenerateMatches(newTourney);
            _context.SaveChanges();

            return CreatedAtAction(nameof(GetTourneyById), new { id = newTourney.Id }, newTourney);
        }

        [HttpPut("{id}")]
        public IActionResult UpdateTourney(int id, [FromBody] Tourney updatedTourney)
        {
            var tourney = _context.Tourney.FirstOrDefault(t => t.Id == id);
            if (tourney == null)
            {
                return NotFound();
            }

            tourney.Name = updatedTourney.Name;
            tourney.Matches = updatedTourney.Matches;

            _context.SaveChanges();
            return NoContent();
        }

        [HttpDelete("{id}")]
        public IActionResult DeleteTourney(int id)
        {
            var tourney = _context.Tourney.FirstOrDefault(t => t.Id == id);
            if (tourney == null)
            {
                return NotFound();
            }

            _context.Tourney.Remove(tourney);
            _context.SaveChanges();
            return NoContent();
        }

        [HttpGet("{id}/matches")]
        public IActionResult GetTourneyMatches(int id)
        {
            var tourney = _context.Tourney.FirstOrDefault(t => t.Id == id);
            if (tourney == null)
            {
                return NotFound();
            }

            return Ok(tourney.Matches);
        }

        private void GenerateMatches(Tourney tourney)
        {
            var teams = _context.Teams.ToList();
            if (teams.Count < 2)
            {
                throw new InvalidOperationException("Not enough teams to generate matches.");
            }

            var random = new Random();
            var matches = new List<Match>();
            var matchId = 1;
            var matchTimes = new List<DateTime>();

            for (int i = 0; i < teams.Count; i++)
            {
                for (int j = i + 1; j < teams.Count; j++)
                {
                    DateTime startTime;
                    do
                    {
                        startTime = DateTime.UtcNow.AddDays(random.Next(1, 30)).AddHours(random.Next(0, 24));
                    } while (matchTimes.Any(mt => mt.Date == startTime.Date && (mt.Hour == startTime.Hour || mt.Hour == startTime.Hour + 1 || mt.Hour == startTime.Hour - 1)));

                    matchTimes.Add(startTime);

                    var match = new Match
                    {
                        Id = matchId++,
                        Team1 = teams[i],
                        Team2 = teams[j],
                        StartTime = startTime,
                        Finished = false,
                        Bets = new List<Bet>()
                    };
                    matches.Add(match);
                }
            }

            tourney.Matches = matches;
            _context.Matches.AddRange(matches);
            _context.SaveChanges();
        }
    }
}
