@include('template.header')

<div class="row">
    <table class="">
        <thead><tr><td><bold>Create New Task</bold></td></tr></thead>

    <div class="ten columns">
        <tr><td style="padding: 14px;">  <form method="post" action="{{ route('tasks.store') }}" >
            <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
                <label for="task_name">Name:</label>
                <input type="text" id="task_name" name="task_name" value=""><br>

                <label for="priority">Priority:</label>
                <input type="text" id="priority" name="priority" value=""><br>
                <div style="margin-top:10px;"><input  style="margin-bottom: -13px;margin-left: 41px;margin-top: 17px;" class="button-primary" type="submit" value="Submit"></div>
            </form>
            </td>
        </tr>
    </div>
    </table>
    </div>
</div>
@include('template.footer')

