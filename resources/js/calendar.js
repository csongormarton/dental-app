import {Calendar} from '@fullcalendar/core';
import rrulePlugin from '@fullcalendar/rrule';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

let calendar = null;
let selectedRange = null;
let clientName = null;
let reservationType = null;

document.addEventListener('DOMContentLoaded', function () {
    init();
});

function init() {
    initCalendar();
    getReservationsFromServer();
}

function initCalendar() {
    let calendarEl = document.getElementById('calendar');
    calendar = new Calendar(calendarEl, {
        plugins: [rrulePlugin, dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        selectable: true,
        firstDay: 1,
        weekNumbers: true,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        height: 'auto',
        events: [],
        select: select
    });
    calendar.render();
}

function select(info) {
    if (!document.getElementById('reservation-modal').classList.contains('hidden')) {
        window.toggleModal('reservation-modal');
    }
    if (info.view.type !== 'timeGridDay') {
        calendar.changeView('timeGridDay');
        calendar.gotoDate(info.startStr);
        return;
    }
    toggleModal('reservation-modal');
    selectedRange = info;
}

function getReservationsFromServer() {
    axios.get(getReservationsUrl)
        .then((res) => {
            calendar.addEventSource(res.data.data);
        }).catch((error) => {
    });
}

function isInputsValid() {
    let isValid = true;
    let clientNameErrorElement = document.getElementById('client-name-required');

    if (clientName) {
        clientNameErrorElement.classList.add('hidden');
    } else {
        clientNameErrorElement.classList.remove('hidden');
        isValid = false;
    }

    return isValid;
}

function prepareFormData() {
    let data = new FormData();

    data.append('client_name', clientName);
    data.append('start', selectedRange.startStr);
    data.append('recurring', reservationType);

    let day = selectedRange.start.getDay() - 1;
    data.append('day', day === -1 ? 6 : day);

    let date = new Date(selectedRange.end.getTime() - selectedRange.start.getTime());
    data.append('duration', date.getHours() + ':' + date.getMinutes());

    if (reservationType === 'none') {
        data.append('end', selectedRange.endStr);
    }

    return data;
}

window.addNewReservation = function () {
    clientName = document.getElementById('client-name').value;
    reservationType = document.querySelector('input[name="reservation_type"]:checked').value;

    if (!isInputsValid()) return;

    axios.post(storeReservationUrl, prepareFormData())
        .then((res) => {
            processResponse('success', res.data);
        }).catch((error) => {
        processResponse('error', error.response.data);
    })
}

function processResponse(type, data) {
    window.toggleNotification(type, data.message);
    window.toggleModal('reservation-modal');
    window.scrollTo(0, 0);
    calendar.removeAllEvents();
    getReservationsFromServer();
}

window.toggleModal = function (modalID) {
    let isModalHide = document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    document.getElementById('client-name-required').classList.add('hidden');
    if (isModalHide) {
        document.getElementById('client-name').value = '';
    }
}
