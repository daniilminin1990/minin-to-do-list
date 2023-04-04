<div class="task <?php if($item->done) echo 'checked'; ?>" data-id="<?php echo $item->id; ?>">
    <div class="done"></div> <!--Блок для иконок выполнения задач-->
    <div class="heading"><?php echo $item->name_task; ?></div>
    <div class="date"><?php echo $item->date_start; ?></div>
    <div class="count_day">
        <span><?php echo $item->count_day; ?></span> / 1
    </div> <!--Здесь будем выводить сколько времени на выполнение задачи осталось, т.е. будем высчитывать. 2 дня было дано, 1 осталось-->
    <!-- Кнопка для редактирования задачи-->
    <div class="update"></div>
    <!-- Кнопка удаления задачи -->
    <div class="delete"></div>
    <!-- Не важно, что это блоки, но они у нас будут кнопками, мы это настроим в JS. Удаление и редактирование через JS -->
</div> 