//loaders
function loader(v) {
    if (v === 'on') {
        $('#loader').show();
    } else {
        $('#loader').hide();
    }
}

function loader_delete(v) {
    if (v === 'on') {
        $('#loader-delete').show();
    } else {
        $('#loader-delete').hide();
    }
}

function loader_ticket(v) {
    if (v === 'on') {
        $('#loader-ticket').show();
        $('#ticket-btn').hide();
    } else {
        $('#loader-ticket').hide();
        $('#ticket-btn').show();
    }
}

function loader_ticket_update(v) {
    if (v === 'on') {
        $('#loader-ticket-update').show();
    } else {
        $('#loader-ticket-update').hide();
    }
}

//edit profile
var base_url = "http://localhost/ma3ticket/";

function clear_edit() {
    $('#edit-profile-success').hide();
    $('#edit-profile-error').hide();
}

$(document).ready(function () {
    $('form#profileEdit').submit(function (e) {
        e.preventDefault();

        loader('on');

        var info = new FormData();
        info.append('oppId', $('#oppId').val());
        info.append('oppName', $('#oppName').val());
        info.append('oppMail', $('#oppMail').val());
        info.append('oppZipcode', $('#oppZipcode').val());
        $.ajax({
            url: base_url + 'edit-profile',
            method: 'post',
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            data: info,
            success: function (data) {
                if (data.success) {
                    clear_edit();
                    $('#edit-profile-success').find('#edit-profile-message').append('<p>Successfully updated. Refresh page if changes do not appear</p>').addClass('text text-success');
                    $('#edit-profile-success').show();
                    $('#profileModal').modal('hide');

                } else {
                    clear_edit();
                    $('#edit-profile-error').find('#edit-profile-errormessage').empty().append(data.error).addClass('text');
                    $('#edit-profile-error').show();
                }
                loader('off');

            },
            error: function () {
            }
        });
    });
});


//submit a new schedule
function clear_schedule() {
    $('#edit-schedule-success').hide();
    $('#edit-schedule-error').hide();
}

$(document).ready(function () {
    $('form#schedule-form').submit(function (e) {
        e.preventDefault();

        loader('on');

        var info = new FormData();
        info.append('opp_id', $('#opp_id').val());
        info.append('sch_from', $('#sch_from').val());
        info.append('sch_to', $('#sch_to').val());
        info.append('sch_date_day', $('#sch_date_day').val());
        info.append('sch_date_month', $('#sch_date_month').val());
        info.append('sch_date_year', $('#sch_date_year').val());
        info.append('sch_time', $('#sch_time').val());
        info.append('sch_bus', $('#sch_bus').val());
        info.append('sch_bus_capacity', $('#sch_bus_capacity').val());
        info.append('sch_bus_cost', $('#sch_bus_cost').val());
        $.ajax({
            url: base_url + 'add-schedule',
            method: 'post',
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            data: info,
            success: function (data) {
                if (data.success) {
                    clear_schedule();
                    $('#edit-schedule-success').find('#edit-schedule-message').append(data.msg).addClass('text text-success');
                    $('#edit-schedule-success').show();
                    $('#scheduleModal').modal('hide');
                    function red_sch() {
                        window.location = base_url + "active-operation";
                    }
                    window.setTimeout(red_sch(), 4000);

                } else {
                    clear_schedule();
                    $('#edit-schedule-error').find('#edit-schedule-errormessage').empty().append(data.error).addClass('text text-danger');
                    $('#edit-schedule-error').show();
                }
                loader('off');

            },
            error: function () {
            }
        });
    });
});


//update a schedule
function clear_schedule_update() {
    $('#update-schedule-success').hide();
    $('#update-schedule-error').hide();
}

$(document).ready(function () {
    $('form#schedule-update-form').submit(function (e) {
        e.preventDefault();

        loader('on');

        var info = new FormData();
        info.append('sch_id', $('#sch_id').val());
        info.append('sch_from', $('#sch_from').val());
        info.append('sch_to', $('#sch_to').val());
        info.append('sch_date', $('#sch_date').val());
        info.append('sch_time', $('#sch_time').val());
        info.append('sch_bus', $('#sch_bus').val());
        info.append('sch_bus_capacity', $('#sch_bus_capacity').val());
        info.append('sch_bus_cost', $('#sch_bus_cost').val());
        $.ajax({
            url: base_url + 'update-schedule',
            method: 'post',
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            data: info,
            success: function (data) {
                if (data.success) {
                    clear_schedule_update();
                    $('#update-schedule-success').find('#update-schedule-successmessage').append('<p>Successfully updated. Refresh page if you do not see the new schedule</p>').addClass('text text-success');
                    $('#update-schedule-success').show();

                } else {
                    clear_schedule_update();
                    $('#update-schedule-error').find('#update-schedule-errormessage').empty().append(data.error).addClass('text text-danger');
                    $('#update-schedule-error').show();
                }
                loader('off');

            },
            error: function () {
            }
        });
    });
});

//delete a schedule
function clear_schedule_delete() {
    $('#delete-schedule-success').hide();
    $('#delete-schedule-error').hide();
}

$(document).ready(function () {
    $('form#schedule-delete-form').submit(function (e) {
        e.preventDefault();

        loader_delete('on');

        var info = new FormData();
        info.append('sch_id', $('#sch_id').val());
        $.ajax({
            url: base_url + 'delete-schedule',
            method: 'post',
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            data: info,
            success: function (data) {
                if (data.success) {
                    clear_schedule_delete();
                    $('#delete-schedule-success').find('#delete-schedule-successmessage').append('<p>Successfully deleted.</p>').addClass('text text-success');
                    $('#delete-schedule-success').show();
                    function red_del() {
                        window.location = base_url + "active-operation";
                    }
                    window.setTimeout(red_del(), 4000);

                } else {
                    clear_schedule_delete();
                    $('#delete-schedule-error').find('#delete-schedule-errormessage').empty().append(data.error).addClass('text text-danger');
                    $('#delete-schedule-error').show();
                }
                loader_delete('off');

            },
            error: function () {
            }
        });
    });
});


//find a ticket
function clear_find_ticket() {
    $('#ticket-success').hide();
    $('#ticket-error').hide();
}

$(document).ready(function () {
    $('form#ticket_search_form').submit(function (e) {
        e.preventDefault();

        loader_ticket('on');

        var info = new FormData();
        info.append('ticket_number', $('#ticket-number').val());
        $.ajax({
            url: base_url + 'search-ticket',
            method: 'post',
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            data: info,
            success: function (data) {
                if (data.success) {
                    clear_find_ticket();
                    $('#ticket-success').find('#ticket-success-message').empty().append('<p>Ticket found.</p>').addClass('text text-success');
                    $('#ticket-success').show();
                    $('#search-ticket-results').show();
                    $('#c-name').empty().append(data.cname);
                    $('#ticket-link').empty().append('<a href="' + base_url + 'ticket-view?ticket-id=' + data.tid + '">View details</a>');

                } else {
                    clear_find_ticket();
                    $('#ticket-error').find('#ticket-error-message').empty().append(data.error).addClass('text text-danger');
                    $('#ticket-error').show();
                    $('#search-ticket-results').hide();
                }
                loader_ticket('off');

            }
        });
    });
});


//cancel a ticket
function clear_ticket_update() {
    $('#update-ticket-error').hide();
    $('#update-ticket-success').hide();
}

$(document).ready(function () {
    $('form#cancel-ticket').submit(function (e) {
        e.preventDefault();

        loader_ticket_update('on');

        var info = new FormData();
        info.append('ticket_id', $('#ticket_id').val());
        $.ajax({
            url: base_url + 'cancel-ticket',
            method: 'post',
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            data: info,
            success: function (data) {
                if (data.success) {
                    clear_schedule_delete();
                    $('#update-ticket-success').find('#update-ticket-successmessage').empty().append('<p>Successfully updated.</p>').addClass('text text-success');
                    $('#update-ticket-success').show();
                    function red_del() {
                        window.location = base_url + "active-ticket";
                    }
                    window.setTimeout(red_del(), 4000);

                } else {
                    clear_schedule_delete();
                    $('#update-ticket-error').find('#update-ticket-errormessage').empty().append(data.error).addClass('text text-danger');
                    $('#update-ticket-error').show();
                }
                loader_ticket_update('off');

            },
            error: function () {
            }
        });
    });
});


$(document).ready(function () {
    $('form#confirm-ticket').submit(function (e) {
        e.preventDefault();

        loader_ticket_update('on');

        var info = new FormData();
        info.append('ticket_id', $('#ticket_id').val());
        $.ajax({
            url: base_url + 'confirm-ticket',
            method: 'post',
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            data: info,
            success: function (data) {
                if (data.success) {
                    clear_schedule_delete();
                    $('#update-ticket-success').find('#update-ticket-successmessage').empty().append('<p>Successfully updated.</p>').addClass('text text-success');
                    $('#update-ticket-success').show();
                    function red_del() {
                        window.location = base_url + "active-ticket";
                    }
                    window.setTimeout(red_del(), 4000);

                } else {
                    clear_schedule_delete();
                    $('#update-ticket-error').find('#update-ticket-errormessage').empty().append(data.error).addClass('text text-danger');
                    $('#update-ticket-error').show();
                }
                loader_ticket_update('off');

            },
            error: function () {
            }
        });
    });
});

