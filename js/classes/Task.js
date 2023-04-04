class Task {
    constructor() {
        
    }
    
    // Функция получения всех задач
    loop() {
        const tasks = document.querySelectorAll('.task')
        tasks.forEach(task => {
            this.update(task);
            this.delete(task);
            this.done(task);
        })
    }
    
    // Добавление задачи
    add(heading, countDay) {
        // Ajax
        // sendRequest(`/handlers/add-task.php?name_task=${heading}&count_day=${countDay}`);
        notice('Задача добавлена');
        
        // Добавление задачи на сайт
        const thisObj = this;
        const http = new XMLHttpRequest();
        http.open('GET', `/handlers/add-task-2.php?name_task=${heading}&count_day=${countDay}`);
        http.responseType = 'document';
        
        http.addEventListener('load', function() {
            // Буду отправлять запрос, оттуда нужно получить HTML элемент
            const blockTask = http.response.querySelector('.task');
            thisObj.update(blockTask);
            thisObj.delete(blockTask);
            thisObj.done(blockTask);
            const tasks = document.querySelector('.tasks');
            tasks.prepend(blockTask);
        })
        http.send();
    }

    // Выполнение задачи
    done(task) {
        const doneBtn = task.querySelector('.done')
        let doneResult;

        doneBtn.addEventListener('click', () => {
            // Что должно добавляться - класс checked. А потом удаляться, поэтому будем использовать метод TOGGLE
            task.classList.toggle('checked')
            if(task.classList.contains('checked')) { //contains - метод о наличии класса в искомом элементе
                notice('Задача выполнена', 'notice_img_done');
                doneResult = 1;
            } else {
                //notice('Задача не выполнена');
                doneResult = 0;
            }
            sendRequest(`/handlers/done-task.php?id=${task.dataset.id}&done=${doneResult}`);
        })
    }

    // Изменение задачи
    update(task) {
        const updateBtn = task.querySelector('.update')
        const heading = task.querySelector('.heading')
        const date = task.querySelector('.date')
        const countDay = task.querySelector('.count_day span')

        let headingOld ='', 
            dateOld ='', 
            countDayOld ='';

        updateBtn.addEventListener('click', () => {
            task.classList.toggle('editable')

            if(task.classList.contains('editable')) {
                heading.setAttribute('contenteditable', 'true')
                date.setAttribute('contenteditable', 'true')
                countDay.setAttribute('contenteditable', 'true')

                headingOld = heading.innerText;
                dateOld = date.innerText;
                countDayOld = countDay.innerText;
            } else {
                heading.removeAttribute('contenteditable')
                date.removeAttribute('contenteditable')
                countDay.removeAttribute('contenteditable')

                if(heading.innerText != headingOld || date.innerText != dateOld || countDay.innerText != countDayOld)
                notice('Сохранено');
            }
            sendRequest(`/handlers/update-task.php?id=${task.dataset.id}&heading=${heading.innerText}&date=${date.innerText}&count_day=${countDay.innerText}`);
        })
    }

    // Удаление задачи
    delete(task) {
        const deleteBtn = task.querySelector('.delete')
        deleteBtn.addEventListener('click', () => {

            const confirmed = confirm('Вы действительно хотите удалить задачу?');
            if(confirmed) {
                task.remove();
                notice('Задача удалена');

                let taskId = task.dataset.id;
                sendRequest(`/handlers/delete-task.php?id=${taskId}`)
            }
        })
    }
}