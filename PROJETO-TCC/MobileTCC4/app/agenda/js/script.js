'use strict';

//Public Globals
const days = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'];
const months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

let c_date = new Date();
let day = c_date.getDay();
let month = c_date.getMonth();
let year = c_date.getFullYear();

(function App() {

    const calendar = 
    `<div class="container">    
            <div class="row">
                <div class="col-sm-6 col-12 d-flex">
                    <div class="card border-0 mt-5 flex-fill">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <span class="prevMonth">&#10096;</span>
                            <span><strong id="s_m"></strong></span>
                            <span class="nextMonth">&#10097;</span>
                        </div>
                        <div class="card-body px-1 py-3">
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless">
                                    <thead class="days text-center">
                                        <tr>
                                            ${Object.keys(days).map(key => (
                                                `<th><span>${days[key].substring(0,3)}</span></th>`
                                            )).join('')}                                            
                                        </tr>
                                    </thead>
                                    <tbody id="dates" class="dates text-center"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12 d-flex pa-sm">
                    <div class="card border-0 mt-5 flex-fill d-none" id="event">
                        <div class="card-header py-3 text-center">
                            Aula
                            <button type="button" class="close hide" >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body px-1 py-3">
                            <div class="text-center">
                                <span class="date-event">06 June 2020</span><br>
                                <span class="event-day">Monday</span>
                            </div> 
                            <div class="events-today my-3 px-3">
                               
                            </div> 
                            <div class="input-group events-input mb-3 col-10 mx-auto mt-2">
                                
                                <div class="input-group-append">
                                    <button class="btn btn-warning" type="button" id="createEvent" data-toggle="modal" data-target="#modalCadastra"><i class="far fa-calendar-plus"></i></button>
                                </div>
                            </div>                        
                        </div>
                    </div>                            
                </div>
            </div>
        </div>
        `;
    document.getElementById('app').innerHTML = calendar;   
})()

function renderCalendar(m, y) {
    //Month's first weekday
    let firstDay = new Date(y, m, 1).getDay();  
    //Days in Month
    let d_m = new Date(y, m+1, 0).getDate();
    //Days in Previous Month
    let d_pm = new Date(y, m, 0).getDate();
    
    
    let table = document.getElementById('dates');
    table.innerHTML = '';
    let s_m = document.getElementById('s_m');
    s_m.innerHTML = months[m] + ' ' + y;
    let date = 1;
    //remaing dates of last month
    let r_pm = (d_pm-firstDay) +1;
    for (let i = 0; i < 6; i++) {
        let row = document.createElement('tr');
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {  
                let cell = document.createElement('td');
                let span = document.createElement('span');
                let cellText = document.createTextNode(r_pm);
                span.classList.add('ntMonth');
                span.classList.add('prevMonth');                  
                cell.appendChild(span).appendChild(cellText);
                row.appendChild(cell);
                r_pm++;
            }
            else if (date > d_m && j <7) {
                if (j!==0) {
                    let i = 0; 
                    for (let k = j; k < 7; k++) {
                         i++                                             
                        let cell = document.createElement('td');
                        let span = document.createElement('span');
                        let cellText = document.createTextNode(i);
                        span.classList.add('ntMonth');                    
                        span.classList.add('nextMonth');                    
                        cell.appendChild(span).appendChild(cellText);
                        row.appendChild(cell);          
                    };                  
                }                
               break;
            }
            else {
                let cell = document.createElement('td');
                let span = document.createElement('span');
                let cellText = document.createTextNode(date);
                span.classList.add('showEvent');
                if (date === c_date.getDate() && y === c_date.getFullYear() && m === c_date.getMonth()) {
                    span.classList.add('day-now');
                } 
                cell.appendChild(span).appendChild(cellText);
                row.appendChild(cell);
                date++;
            }
        }
        table.appendChild(row);
    }
}
renderCalendar(month, year)


    $(function(){
        function showEvent(eventDate){
            let storedEvents = JSON.parse(localStorage.getItem('events'));
            if (storedEvents == null){
                $('.events-today').html('<h5 class="text-center">No events found</h5 class="text-center">');               
            }else{
                let eventsToday = storedEvents.filter(eventsToday => eventsToday.eventDate === eventDate);
                let eventsList = Object.keys(eventsToday).map(k => eventsToday[k]);
                if(eventsList.length>0){
                    let eventsLi ='';
                    eventsList.forEach(event =>  $('.events-today').html(eventsLi +=`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ${event.eventText}
                    <button type="button" class="close remove-event" data-event-id="${event.id}" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>`));
                }else{
                    $('.events-today').html('<h5 class="text-center">No events found</h5 class="text-center">');
                }               
            }
        }
       /* function removeEvent(id){
            let storedEvents = JSON.parse(localStorage.getItem('events'));
            if(storedEvents != null){
                storedEvents = storedEvents.filter( ev => ev.id != id ); 
                localStorage.setItem('events', JSON.stringify(storedEvents));
                $('.toast-body').html('Your event have been removed');
                $('.toast').toast('show');
            }
        }        
        $(document).on('click', '.remove-event', function(){
            let eventId = $(this).data('event-id');
            removeEvent(eventId);
        })*/

        $(document).on('click', '.prevMonth', function(){
            year = (month === 0) ? year - 1 : year;
            month = (month === 0) ? 11 : month - 1;
            renderCalendar(month, year);
        })
        $(document).on('click', '.nextMonth', function(){
            year = (month === 11) ? year + 1 : year;
            month = (month + 1) % 12;
            renderCalendar(month, year);
        })
    
        $(document).on('click', '.showEvent', function(){
            $('.showEvent').removeClass('active');
            $('#event').removeClass('d-none');
            $(this).addClass('active');
            let todaysDate = $(this).text() +' '+ (months[month]) +' '+ year;
            let eventDay = days[new Date(year, month, $(this).text()).getDay()];
            let eventDate = $(this).text() + month + year;
            $('.date-event').html(todaysDate).data('eventdate', eventDate);
            $('.event-day').html(eventDay);
            //showEvent(eventDate);

            let mes = (month+1).toString().padStart(2, '0');
            let dia = $(this).text().toString().padStart(2, '0');
            var date = year +"-"+mes+"-"+dia;

            document.getElementById('hdnData').value = date;
            
           $('.events-today').html("");
           $('#tbl_aluno').html("");

            $.ajax({
              type : "POST",
              url : "http://localhost/MobileTCC4/app/ajax/consulta_agenda.php", 
              data: { date: date,  },
              success : function(response) {
                console.log("boaa");
            
               var arrayJson = JSON.parse(response);
               var alunos = arrayJson.alunos;
               console.log(alunos); 
                for (var i = 0, l = alunos.length; i < l; i++) {
                var content = `<div class="alert alert-dark alert-dismissible fade show" id="hr_alunos" role="alert">`;
                content +=  `<i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;&nbsp;`;
                content +=  alunos[i].horaInicial;
                content +=  "&nbsp;&nbsp;&nbsp;";
                content +=  alunos[i].horaFinal;                
                content += `</div>`;
                

                  $('.events-today').append(content);
                }
            },
              error : function(response) {
                console.log("error..!! - ajax consulta aulas");
              }
            });

            $.ajax({
              type : "POST",
              url : "http://localhost/MobileTCC4/app/ajax/busca_aula.php", 
              data: { date: date,  },
              success : function(response) {
                console.log("boaa");
            
               var arrayJson = JSON.parse(response);
               var alunos = arrayJson.alunos;
               console.log(alunos); 
                for (var i = 0, l = alunos.length; i < l; i++) {
                var content = `<tr data-id="${alunos[i].cod_age}" data-start="${alunos[i].horaInicial}" data-over="${alunos[i].horaFinal}" 
                class="tr-aluno" onclick="changeBgColor(this,document.getElementById('hdnCodAula'))">`;
                content += `<td>${alunos[i].horaInicial}</td>`;
                content += `<td>${alunos[i].horaFinal}</td>`;
                content += `</tr>`;
                                
                  $(' #tbl_aluno').append(content);
                }
            },
              error : function(response) {
                console.log("error..!! - ajax consulta aulas");
              }
            });
        })

        $(document).on('click', '.hide', function(){
            $('#event').addClass('d-none');
        })
        /*$(document).on('click', '#createEvent', function(){
            let events = localStorage.getItem('events');
            let obj = [];
            if (events) {
                obj = JSON.parse(events);
            }
            let eventDate = $('.date-event').data('eventdate');
            let eventText = $('#eventTxt').val();
            let valid = false;
            $('#eventTxt').removeClass('data-invalid');
            $('.error').remove();
            if (eventText == ''){
                $('.events-input').append(`<span class="error">Please enter event</span>`);
                $('#eventTxt').addClass('data-invalid');
                $('#eventTxt').trigger('focus');
            }else if(eventText.length < 3){
                $('#eventTxt').addClass('data-invalid');
                $('#eventTxt').trigger('focus');
                $('.events-input').append(`<span class="error">please enter at least three characters</span>`);
            }else{
                valid = true;
            }
            if (valid){
                let id =1;
                if (obj.length > 0) {
                    id = Math.max.apply('', obj.map(function (entry) { return parseFloat(entry.id); })) + 1;
                }
                else {
                    id = 1;
                }
                obj.push({
                    'id' : id,
                    'eventDate': eventDate,
                    'eventText': eventText
                });           
                localStorage.setItem('events', JSON.stringify(obj));
                $('#eventTxt').val('');
                $('.toast-body').html('Your event have been added');
                $('.toast').toast('show');
                showEvent(eventDate);
            }
        })*/
    })

            
