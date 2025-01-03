using Microsoft.AspNetCore.Mvc;
using VoetbalTournamentAPI.Data;
using VoetbalTournamentAPI.Model;
using System.Linq;
using Microsoft.EntityFrameworkCore;

namespace VoetbalTournamentAPI.Controllers
{
    [ApiController]
    [Route("api/[controller]")]
    public class MatchController : ControllerBase
    {
        private readonly VoetbalTournamentDataContext _context;

        public MatchController(VoetbalTournamentDataContext context)
        {
            _context = context;
        }

        [HttpGet]
        public IActionResult GetAllMatches()
        {
            var matches = _context.Matches
                .Include(m => m.Team1)
                .Include(m => m.Team2)
                .ToList();
            return Ok(matches);
        }

        [HttpGet("{id}")]
        public IActionResult GetMatchById(int id)
        {
            var match = _context.Matches
                .Include(m => m.Team1)
                .Include(m => m.Team2)
                .FirstOrDefault(m => m.Id == id);
            if (match == null)
            {
                return NotFound();
            }

            return Ok(match);
        }

        [HttpDelete("{id}")]
        public IActionResult DeleteMatch(int id)
        {
            var match = _context.Matches.FirstOrDefault(m => m.Id == id);
            if (match == null)
            {
                return NotFound();
            }

            _context.Matches.Remove(match);
            _context.SaveChanges();
            return NoContent();
        }
    }
}

