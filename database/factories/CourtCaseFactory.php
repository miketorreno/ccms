<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Court;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourtCase>
 */
class CourtCaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'case_number' => rand(1111, 9999),
            'archive_number' => rand(1111, 9999),
            'rank' => fake()->randomElement(['መ/ወ/ር', 'ም/፲/አ', '፲/አ', '፶/አ', 'ም/አ', 'መ/አ', 'ሻ/ል', 'ኮ/ል']),
            'accused' => fake()->name(),
            'accuser' => fake()->name(),
            'location' => fake()->randomElement(['ምዕራብ ዕዝ', 'ሰሜን ምዕራብ ዕዝ', 'ማዕከላዊ ዕዝ', 'ደቡብ ዕዝ', '6ኛ ዕዝ', '7ኛ ዕዝ', 'አየር ሃይል']),
            'case_type' => fake()->randomElement(['ኩብለላ', 'ስርቆት', 'ከባድ የሰው ግድያ', 'የጥሪ ትህዛዝ አልማክበር', 'ከባድና ቀላል የአካል ጉዳት ማድረሰ', 'ሰራዊቱን ተስፋ ማስቆረጥ', 'ከስር ማምለጥ/ማስመለጥ', 'ያለሃግባብ መቅረት', 'ለበላይ አለመታዘዝ', 'የዘብ ጥበቃ መጣስ', 'ራስን ማቁሰል']),
            'case_status' => fake()->randomElement(['በሂደት ላይ', 'በቀጠሮ ላይ', 'የተወሰነ']),
            'cause_of_action' => fake()->randomElement(['በራሳቸው', 'በግል ጠበቃ', 'በተከላካይ ጠበቃ']),
            'case_details' => fake()->paragraph(),
            // 'court_id' => Court::factory(),
            'clerk_id' => User::factory(),
            'lawyer_id' => User::factory(),
            'start_date' => date('Y-m-d H:i:s'),
            'app_date' => date('Y-m-d H:i:s'),
            'app_reason' => fake()->randomElement(['ለፍርድ', 'ለቃል ዝርዝር', 'ለእምነት ክህደት ቃል', 'የአቃቢ ህግ ማስረጃ ለመስማት', 'የተከላካይ ጠበቃ ማስረጃ ለመስማት']),
        ];
    }
}
