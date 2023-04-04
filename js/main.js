
function notice(heading, nameImg = '') {

    const noticesContent = document.querySelector('.notices');

    const divNotice = document.createElement('div');
    divNotice.classList.add('notice');

    const divImg = document.createElement('div');
    divImg.classList.add('notice_img');

    if(nameImg) {
    // Т.е если впринципе вызывая функцию второй параметр указал, то делаю следующее
    // А внутри add(пишу второй параметр - nameImg)
        divImg.classList.add(nameImg);
    }

    const tagP = document.createElement('p');
    tagP.innerText = heading;
    
    const tagClose = document.createElement('div');
    tagClose.classList.add('notice_close');
    tagClose.innerText = 'x';

    
    // Добавляю элементы внутрь уведомления
    divNotice.append(divImg, tagP, tagClose);
    // Созданное уведомление добавляю на сайт
    noticesContent.prepend(divNotice)
    
    // Принудительно. Здесь добавил закрытие уведомления вручную
    tagClose.addEventListener('click', () => {
        divNotice.classList.remove('active');
        setTimeout(() => {
            divNotice.remove();
        }, 1000)
    })


    // Добавил класс active к divNotice
    divNotice.classList.add('active')
    
    // Удаляю active через 5 сек. И ТАКЖЕ УДАЛЯЮ ВОВСЕ ВЕСЬ divNotice после удаления класса active, через 1 сек удалить этот divNotice,тогда пишу новый setTimeout внутри с 1000мс
    setTimeout(() => {
        divNotice.classList.remove('active')
        setTimeout(() => {
            divNotice.remove();
        }, 1000)
    }, 5000)
}

function sendRequest(query) {
    const http = new XMLHttpRequest();
    http.open('GET', query);
    http.send();
}


// Tabs
const tabs = document.querySelectorAll('.tab')
const tabContent = document.querySelectorAll('.tab_content')
tabs.forEach((tab, idTab)=> { /*Объявил переменную idTab для того, чтобы потом производить выполнение равенства по индексу массива tab (Вход, регистрация)
и индексу tab_content (тоже вход, регистрация). Если id tab "Вход" будет совпадать с id tab_content, то вывожу "Регистрация" */
    tab.addEventListener('click', () => {
        // Чтобы вывести соответствующую вкладку с контентом нужно сначала удалить класс active, поэтому ниже forEach для active
        tabs.forEach(tab2 => {
            tab2.classList.remove('active')
            // Пробежались, чтобы удалить active для каждого встречного active, поэтому foreach
        })
        tab.classList.add('active')
        // Вне цикла добавил active тому, на тот tab, который нажали

        // Content, работаю с контентом
        tabContent.forEach((content,idContent) => {
            if(idTab == idContent) {  //Если индекс массива tab будет равен индексу массива tab_content, то
                content.classList.add('active') // Добавляю класс active
            } else {
                content.classList.remove('active') // В противном случае удаляю класс Active
            }
        })
    })
})

// Объект задач
// Отмена события перехода на др стр при нажатии на кнопку при добавлении задачи
const tasks = new Task()
// Поменял в js/Tasks.js get_tasks на loop
// Применяю метод loop к перемернной tasks, которая равна созданию нового класса JS
tasks.loop();
//Метод Add, ниже, происходит только тогда, когда мы нажимаем на кнопку button. Поэтому нужно ее найти
const addTaskButton = document.querySelector('.add_task_form .button')
/*
Вешаю событие на клик и отменяю стандартные функции кнопки button перехода на другую страницу
Теперь для случаев когда может быть несколько страниц и на другой странице у нас может не быть такой кнопки. Поэтому нужно добавить проверку наличия кнопки. А это условный оператор if:
То есть вешаю событие только в том случае, если кнопка существует:
*/
if(addTaskButton) {
    
    addTaskButton.addEventListener('click', (elem) => {
        elem.preventDefault();
        // console.log(addTaskButton)
        const inputNameTask = document.querySelector('.input_name_task')
        const inputCountDay = document.querySelector('.input_count_day')
        
        tasks.add(inputNameTask.value, inputCountDay.value);

        inputNameTask.value = '';
        inputCountDay.value = '';
    })
}

    // Header
    // Thema
const themaButton = document.querySelector('.thema');
themaButton.addEventListener('click', ()=> {
    document.body.classList.toggle('thema_light');

    let resultThema = '',
        resultCookie = '';
    
    if(document.body.classList.contains('thema_light')) {
        resultThema = 'light';
        resultCookie = 3600 * 24 * 30;
        //  Создал куки thema-light на месяц 
    } else {
        resultCookie = 0;
        resultThema = '';
    }

    document.cookie = 'thema=light; max-age=' + resultCookie;
    //Т.е. здесь присваиваю результаты переменной resultCookie document.cookie, которые в свою очередь равны нижеописанному
    // document.cookie = document.body.classList.contains('thema_light') ? 'thema=light; max-age=' + 3600 * 24 * 30 : 'thema=light; max-age=0';

    sendRequest(`/handlers/thema.php/?thema=${resultThema}`);
    // Передаю в запросе переменную themaResult, только эту переменную нужно будет где-то создать. И в зависимости от условия передавать разные значения
})