using System.Security.Cryptography;
using System.Text;

namespace VoetbalTournamentAPI.Model
{
    public class User
    {
        public int Id { get; set; }
        public required string Name { get; set; }
        public required string Email { get; set; }
        public string Password { get; set; }
        public string? Token { get; set; }
        public bool IsAdmin { get; set; }
        public decimal Money { get; set; }
    }
}
