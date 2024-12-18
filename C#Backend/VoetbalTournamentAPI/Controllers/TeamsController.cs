using Microsoft.AspNetCore.Mvc;
using VoetbalTournamentAPI.Data;
using VoetbalTournamentAPI.Model;
using System.Collections.Generic;
using System.Linq;

namespace VoetbalTournamentAPI.Controllers
{
    [ApiController]
    [Route("api/[controller]")]
    public class TeamsController : ControllerBase
    {
        private readonly VoetbalTournamentDataContext _context;

        public TeamsController(VoetbalTournamentDataContext context)
        {
            _context = context;
        }

        [HttpGet]
        public IActionResult GetAllTeams()
        {
            var teams = _context.Teams.ToList();
            return Ok(teams);
        }

        [HttpGet("{id}")]
        public IActionResult GetTeamById(int id)
        {
            var team = _context.Teams.FirstOrDefault(t => t.Id == id);
            if (team == null)
            {
                return NotFound();
            }

            return Ok(team);
        }

        [HttpPost]
        public IActionResult CreateTeam([FromBody] Team newTeam)
        {
            _context.Teams.Add(newTeam);
            _context.SaveChanges();
            return CreatedAtAction(nameof(GetTeamById), new { id = newTeam.Id }, newTeam);
        }

        [HttpDelete("{id}")]
        public IActionResult DeleteTeam(int id)
        {
            var team = _context.Teams.FirstOrDefault(t => t.Id == id);
            if (team == null)
            {
                return NotFound();
            }

            _context.Teams.Remove(team);
            _context.SaveChanges();
            return NoContent();
        }
    }
}

