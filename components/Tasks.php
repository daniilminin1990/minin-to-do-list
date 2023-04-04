<section class="all_tasks">
    <div class="indent container">
        <!-- Будет классно, если мы тут еще сделаю фильтр, по выполненности, по дате  -->
        <div class="row">
            <div class="col_5">
                <h2>Все задачи</h2>
            </div>
            <div class="col_7 tasks_filter"></div>
        </div>
        <div class = "tasks">
            <?php foreach (get_tasks() as $task) :
                path('components/Task', $task);
            endforeach; ?>
        </div>
    </div>
</section>