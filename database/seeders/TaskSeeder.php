<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Seed realistic task data for local development and testing.
     */
    public function run(): void
    {
        $tasks = [
            ['name' => 'Review customer onboarding checklist before Monday handoff', 'priority' => '1'],
            ['name' => 'Fix broken password reset link in staging environment', 'priority' => '1'],
            ['name' => 'Validate billing export totals against finance spreadsheet', 'priority' => '1'],
            ['name' => 'Prepare incident summary for delayed notification delivery', 'priority' => '1'],
            ['name' => 'Audit admin permissions for recently promoted team leads', 'priority' => '1'],
            ['name' => 'Update production deployment notes for the mobile release', 'priority' => '2'],
            ['name' => 'Write acceptance criteria for dashboard date range filters', 'priority' => '2'],
            ['name' => 'Test CSV import flow with duplicate customer records', 'priority' => '2'],
            ['name' => 'Clean up stale feature flags from the sprint backlog', 'priority' => '2'],
            ['name' => 'Document support escalation steps for payment failures', 'priority' => '2'],
            ['name' => 'Prepare sample data set for analytics QA review', 'priority' => '2'],
            ['name' => 'Confirm timezone handling on calendar reminder emails', 'priority' => '2'],
            ['name' => 'Review pull request for task sorting edge cases', 'priority' => '2'],
            ['name' => 'Schedule design review for the new project overview page', 'priority' => '2'],
            ['name' => 'Verify archived tasks are hidden from active work queues', 'priority' => '2'],
            ['name' => 'Draft release notes for account management improvements', 'priority' => '3'],
            ['name' => 'Refine empty-state copy for the reporting dashboard', 'priority' => '3'],
            ['name' => 'Add QA notes for multi-step task creation workflow', 'priority' => '3'],
            ['name' => 'Check contrast ratios on warning and success messages', 'priority' => '3'],
            ['name' => 'Update help center article for notification preferences', 'priority' => '3'],
            ['name' => 'Review vendor invoice upload workflow with operations', 'priority' => '3'],
            ['name' => 'Create regression checklist for recurring task schedules', 'priority' => '3'],
            ['name' => 'Confirm API error messages are actionable for clients', 'priority' => '3'],
            ['name' => 'Organize backlog items for next sprint planning meeting', 'priority' => '3'],
            ['name' => 'Prepare stakeholder screenshots for workflow prototype', 'priority' => '3'],
            ['name' => 'Test task deletion behavior with browser back navigation', 'priority' => '3'],
            ['name' => 'Document manual rollback steps for database migrations', 'priority' => '3'],
            ['name' => 'Review onboarding email sequence with customer success', 'priority' => '3'],
            ['name' => 'Validate form labels for screen reader compatibility', 'priority' => '3'],
            ['name' => 'Update seed data notes in the developer README draft', 'priority' => '3'],
            ['name' => 'Archive completed discovery notes from last quarter', 'priority' => '4'],
            ['name' => 'Refresh demo account task list for sales walkthroughs', 'priority' => '4'],
            ['name' => 'Clean duplicate labels from exported customer segments', 'priority' => '4'],
            ['name' => 'Review slow query notes from local performance testing', 'priority' => '4'],
            ['name' => 'Prepare agenda for monthly product operations sync', 'priority' => '4'],
            ['name' => 'Update test fixture names to match current terminology', 'priority' => '4'],
            ['name' => 'Confirm footer copyright year renders on all pages', 'priority' => '4'],
            ['name' => 'Collect screenshots for visual regression baseline', 'priority' => '4'],
            ['name' => 'Review task priority wording with the support team', 'priority' => '4'],
            ['name' => 'Draft internal announcement for the sorting improvement', 'priority' => '4'],
            ['name' => 'Remove outdated meeting notes from the shared tracker', 'priority' => '5'],
            ['name' => 'Rename local browser bookmarks used during QA passes', 'priority' => '5'],
            ['name' => 'Organize sample exports in the development workspace', 'priority' => '5'],
            ['name' => 'Review placeholder text in low-traffic settings screens', 'priority' => '5'],
            ['name' => 'Compare demo task names with training documentation', 'priority' => '5'],
            ['name' => 'Collect nice-to-have ideas from the retrospective board', 'priority' => '5'],
            ['name' => 'Tidy old notes from completed onboarding experiments', 'priority' => '5'],
            ['name' => 'Prepare optional polish list for the next maintenance cycle', 'priority' => '5'],
            ['name' => 'Review unused test accounts before the next demo reset', 'priority' => '5'],
            ['name' => 'Draft follow-up questions for future reporting enhancements', 'priority' => '5'],
        ];

        $startingSortOrder = ((int) Task::query()->max('sort_order')) + 1;

        Task::factory()
            ->count(count($tasks))
            ->sequence(function (Sequence $sequence) use ($tasks, $startingSortOrder) {
                $createdAt = fake()->dateTimeBetween('-120 days', '-2 days');

                return [
                    'task_name' => $tasks[$sequence->index]['name'],
                    'priority' => $tasks[$sequence->index]['priority'],
                    'sort_order' => $startingSortOrder + $sequence->index,
                    'created_at' => $createdAt,
                    'updated_at' => fake()->dateTimeBetween($createdAt, 'now'),
                ];
            })
            ->create();
    }
}
