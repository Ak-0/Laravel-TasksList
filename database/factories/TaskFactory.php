<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween('-120 days', '-2 days');

        $verbs = [
            'Audit',
            'Build',
            'Clean up',
            'Document',
            'Draft',
            'Fix',
            'Prepare',
            'Review',
            'Schedule',
            'Validate',
        ];

        $subjects = [
            'customer onboarding checklist',
            'dashboard filter behavior',
            'email notification copy',
            'inventory reconciliation report',
            'monthly billing export',
            'new user permissions',
            'password reset workflow',
            'project status summary',
            'QA regression notes',
            'support escalation process',
        ];

        $contexts = [
            'the admin portal',
            'the mobile release',
            'the operations team',
            'the product backlog',
            'the sales handoff',
            'the sprint review',
            'the support queue',
        ];

        return [
            'task_name' => sprintf(
                '%s %s for %s',
                fake()->randomElement($verbs),
                fake()->randomElement($subjects),
                fake()->randomElement($contexts),
            ),
            'priority' => (string) fake()->numberBetween(1, 5),
            'created_at' => $createdAt,
            'updated_at' => fake()->dateTimeBetween($createdAt, 'now'),
        ];
    }

    public function priority(int $priority): static
    {
        return $this->state(fn () => [
            'priority' => (string) max(1, min(5, $priority)),
        ]);
    }

    public function highPriority(): static
    {
        return $this->priority(fake()->numberBetween(1, 2));
    }

    public function lowPriority(): static
    {
        return $this->priority(fake()->numberBetween(4, 5));
    }
}
