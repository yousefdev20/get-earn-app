$(document).ready(function () {

    let elementsUnderProcessing = [];
    let workerId = null;
    const token = ($('meta[name="_token"]').attr('content'))

    function getStatus(id) {
        return fetch('/dashboard/backups/' + id, {
            headers: {
                'X-CSRF-Token': token,
            },
            '_token': token,
            method: 'get'
        })
    }

    function scan() {
        elementsUnderProcessing = [];
        $.each($('.processing'), function (i, val) {
            elementsUnderProcessing.push(val.id)
        });
    }

    function createDeleteForm(id) {
        return `<form class="d-inline" action="/dashboard/backups/${id}" method="POST">
            <input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="_token"
                                                                       value="${token}">
                <button type="submit" class="btn btn-sm btn-danger text-uppercase">Delete</button>
        </form>`
    }

    function createDownloadForm(id) {
        return `<a href="">
                                                        <button class="btn btn-sm btn-info text-uppercase">Download</button>
                                                    </a>`
    }

    async function render(obj) {
        $('#' + obj.id).attr('class', 'done')
        $(`#backup-size-${obj.id} .spinner-border`).remove()
        $(`#backup-size-${obj.id}`).append(`<b>${obj.size} KB</b>`)
        $(`#backup-status-${obj.id}`).text(`${obj.status}`)
        $(`#backup-action-${obj.id} .spinner-border`).remove()
        $(`#backup-action-${obj.id}`).append(`${createDeleteForm()} ${createDownloadForm()}`)
    }

    scan()

    if (elementsUnderProcessing.length > 0) {
        workerId = setInterval(function () {
            console.log('worker is running')
            if (elementsUnderProcessing.length <= 0) {
                clearInterval(workerId)
            }
           elementsUnderProcessing.forEach((i, val) => {
               getStatus(i).then(response => response.json())
                   .then(response =>  {
                   if (response.status !== 'processing') {
                       render(response).then(r => console.log(r))
                       elementsUnderProcessing.splice(elementsUnderProcessing.indexOf(i, 1))
                   }
               }).catch((err) => console.error(err))
           })
            scan()
        }, 20000)
    } else {
        clearInterval(workerId)
    }
});
