@include('template.header')

<div class="row">
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <table class="">
        <thead><tr><td><bold>Task Edit</bold></td></tr></thead>
    <tr><td><form method="post" action="/tasks/update/{{$task->id}}" >

        <div class="row columns">
            <div class="ten columns">
                <div class="five columns">
                    <label for="id">ID:</label>
                    <input type="text" id="id" name="id" class="u-full-width" disabled value="{{$task->id}}"><br>
                </div>
                <div class="five columns">
                    <label for="priority">Priority:</label>
                    <input type="text" id="priority" name="priority" class="u-full-width" value="{{$task->sort_order}}"><br>
                </div>
            </div>
        </div>
        </td></tr>
            <tr><td>
                <div class="row">
                    <div class="eight columns">
                    <label for="task_name"><span>Task Description:</span></label>
                    <input type="text" id="task_name" class="u-full-width" name="task_name" value="{{$task->task_name}}">
                    <input type="submit" class="button-primary"   style="margin-bottom: -13px;margin-left: 41px;margin-top: 17px;" value="Submit">                    </div>
                </div>
            </div>
                    </form>
</td></tr>
</table>
    </div>
</div>
@include('template.footer')
