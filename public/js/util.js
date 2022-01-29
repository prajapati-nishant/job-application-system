const SwalModal = (icon, title, html, timer, toast) => {
    Swal.fire({
        icon,
        title,
        html,
        timer,
        toast
    })
}

const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback, timer, toast) => {
    Swal.fire({
        icon,
        title,
        html,
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: '#d33',
        cancelButtonText: "Annula",
        confirmButtonText,
        reverseButtons: true,
    }).then(result => {
        if (result.value) {
            return livewire.emit(method, params)
        }

        if (callback) {
            return livewire.emit(callback)
        }
    })
}

document.addEventListener('DOMContentLoaded', () => {
    this.livewire.on('swal:modal', data => {
        SwalModal(data.icon, data.title, data.text, data.timer, data.toast)
    })

    this.livewire.on('swal:confirm', data => {
        SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
    })

    this.livewire.on('select2:update', data => {
        $('.select2').each(function (index, select2) {
            select2 = $(select2);
            let placeholder = select2.find('option:first')[0];
            let value = $(placeholder).attr('value');
            if (value === '' || value === null || value === undefined) {
                select2.select2({
                    placeholder: select2.find('option:first').text(),
                    width: '100%'
                })
            } else {
                select2.select2({
                    width: '100%'
                })
            }
        })
    })

    this.livewire.on('trix:update', data => {
        removeTrixImageLinks();
    })
})

function toggleSidebar() {
    let classList = document.querySelector('.sidebar').classList
    classList.toggle('open');
    if (classList.contains('open')) {
        sidebarToggle.querySelector('i').classList.remove('fa-bars');
        sidebarToggle.querySelector('i').classList.add('fa-times');
    } else {
        sidebarToggle.querySelector('i').classList.remove('fa-times');
        sidebarToggle.querySelector('i').classList.add('fa-bars');
    }
}

let sidebarToggle = document.getElementById('sidebar-toggle');
if (sidebarToggle) {
    sidebarToggle.addEventListener('click', toggleSidebar);
}
let closeToggle = document.getElementById('close-sidebar');
if (closeToggle) {
    closeToggle.addEventListener('click', toggleSidebar);
}

$(document).ready(function () {
    $(document).on('click', '.page-link', function () {
        let container = $('.main-container');
        container.animate({
            scrollTop: 0
        }, 1000);
    })

    $(document).on('click', '.application-form .btn', function () {
        $(this).prop('disabled', true);
        $(this).find('i').addClass('fa-spinner fa-spin');
    })
})

