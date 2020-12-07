let objCalendar;
$(function () {
    $(".date-time").mask("00/00/0000 00:00:00"), $(".time").mask("00:00:00"), $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    }), $("#newFastEvent").click(function () {
        clearMessages(".message"), resetForm("#formFastEvent"), $("#modalFastEvent input[name='id']").val(""), showModalCreateFastEvent = !0, $("#modalFastEvent").modal("show"), $("#modalFastEvent #titleModal").text("Criar Evento Rápido"), $("#modalFastEvent button.deleteFastEvent").css("display", "none")
    }), $(document).on("click", ".event", function () {
        clearMessages(".message"), resetForm("#formFastEvent"), showModalUpdateFastEvent = !0;
        let e = JSON.parse($(this).attr("data-event"));
        $("#modalFastEvent").modal("show"), $("#modalFastEvent #titleModal").text("Alterar Evento Rápido"), $("#modalFastEvent button.deleteFastEvent").css("display", "flex"), $("#modalFastEvent input[name='id']").val(e.id), $("#modalFastEvent input[name='title']").val(e.title), $("#modalFastEvent input[name='start']").val(e.start), $("#modalFastEvent input[name='end']").val(e.end), $("#modalFastEvent input[name='color']").val(e.color)
    }), $(".saveFastEvent").click(function () {
        let e, t = $("#modalFastEvent input[name='id']").val(),
            a = {
                title: $("#modalFastEvent input[name='title']").val(),
                start: $("#modalFastEvent input[name='start']").val(),
                end: $("#modalFastEvent input[name='end']").val(),
                color: $("#modalFastEvent input[name='color']").val()
            };
        "" == t ? e = routeEvents("routeFastEventStore") : (e = routeEvents("routeFastEventUpdate"), a.id = t, a._method = "PUT"), sendEvent(e, a)
    }), $(".deleteFastEvent").click(function () {
        let e = $("#modalFastEvent input[name='id']").val(),
            t = {
                id: e,
                _method: "DELETE"
            },
            a = routeEvents("routeFastEventDelete");
        showModalUpdateFastEvent = !0, sendEvent(a, t), $(`#boxFastEvent${e}`).remove()
    }), $(".deleteEvent").click(function () {
        let e = {
            id: $("#modalCalendar input[name='id']").val(),
            _method: "DELETE"
        };
        sendEvent(routeEvents("routeEventDelete"), e)
    }), $(".saveEvent").click(function () {
        let e, t = $("#modalCalendar input[name='id']").val(),
            a = {
                filiere: $("#filiere").val(),
                title: $("#modalCalendar input[name='title']").val(),
                start: moment($("#modalCalendar input[name='start']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss"),
                end: moment($("#modalCalendar input[name='end']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss"),
                color: $("#modalCalendar input[name='color']").val(),
                description: $("#modalCalendar textarea[name='description']").val()
            };
        "" == t ? e = routeEvents("routeEventStore") : (e = routeEvents("routeEventUpdate"), a.id = t, a._method = "PUT"), sendEvent(e, a)
    })
});
let showModalUpdateFastEvent = !1,
    showModalCreateFastEvent = !1;

function sendEvent(e, t) {
    $.ajax({
        url: e,
        data: t,
        method: "POST",
        dataType: "json",
        success: function (e) {
             if (e && (objCalendar.refetchEvents(), $("#modalCalendar").modal("hide")), !0 === showModalUpdateFastEvent) {
                showModalUpdateFastEvent = !1, $("#modalFastEvent").modal("hide");
                let e = `{"id":"${t.id}","filiere":"${t.filiere}","title":"${t.title}","color":"${t.color}","start":"${t.start}","end":"${t.end}"}`;
                $(`#boxFastEvent${t.id}`).attr("data-event", e), $(`#boxFastEvent${t.id}`).text(t.title), $(`#boxFastEvent${t.id}`).css({
                    backgroundColor: `${t.color}`,
                    border: `1px solid ${t.color}`
                })
            }
            if (!0 === showModalCreateFastEvent) {
                showModalCreateFastEvent = !1, $("#modalFastEvent").modal("hide");
                let a = `{"id":"${e.created}","title":"${t.title}","color":"${t.color}","start":"${t.start}","end":"${t.end}"}`,
                    n = `<div id="boxFastEvent${e.created}"\n                        style="padding: 4px; border: 1px solid ${t.color}; background-color: ${t.color}"\n                        class='fc-event event text-center'\n                        data-event='${a}'>\n                        ${t.title}\n                    </div>`;
                $("#external-events-list").append(n)
            }
        },
        error: function (e) {
            let t = e.responseJSON.errors;
            $(".message").html(loadErrors(t))
        }
    })
}

function loadErrors(e) {
    let t = '<div class="alert alert-danger">';
    for (let a in e) t += `<span>${e[a]}</span><br/>`;
    return (t += "</div>").replace(/\,/g, "<br/>")
}

function routeEvents(e) {
    return document.getElementById("calendar").dataset[e]
}

function clearMessages(e) {
    $(e).text("")
}

function resetForm(e) {
    $(e)[0].reset()
}
document.addEventListener("DOMContentLoaded", function () {
    var e = FullCalendar.Calendar;
    new(0, FullCalendarInteraction.Draggable)(document.getElementById("external-events-list"), {
        itemSelector: ".fc-event"
    });
    var t = new e(document.getElementById("calendar"), {
        plugins: ["interaction", "dayGrid", "timeGrid", "list"],
        defaultView: 'timeGridWeek',
        header: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek"
        },
        navLinks: !0,
        locale: "fr",
        navLinks: !0,
        eventLimit: !0,
        selectable: !0,
        eventClick: function (e) {
            
                window.location.href = "/courEvent/"+e.event.id;
            
        },
        eventResize: function (e) {
            let t = moment(e.event.start).format("YYYY-MM-DD HH:mm:ss"),
                a = moment(e.event.end).format("YYYY-MM-DD HH:mm:ss"),
                n = {
                    _method: "PUT",
                    title: e.event.title,
                    id: e.event.id,
                    start: t,
                    end: a
                };
            sendEvent(routeEvents("routeEventUpdate"), n)
        },
        select: function (e) {
    
            clearMessages(".message"), resetForm("#formEvent"), $("#modalCalendar input[name='id']").val(""), $("#modalCalendar").modal("show"),
             $("#modalCalendar #titleModal").text("Ajouter filiére"), $("#modalCalendar button.deleteEvent").css("display", "none");
            let a = moment(e.start).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='start']").val(a);
            let n = moment(e.end).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='end']").val(n), $("#modalCalendar input[name='color']").val("#3788D8"), t.unselect()
        },
        eventReceive: function (e) {
            e.event.remove()
        },
        events: routeEvents("routeLoadEvents")
    });
    objCalendar = t, t.render()
});