"use strict";
// Class definition
var allUsersJson = JSON.parse(allUsers);
function shuffle(arra1) {
    var ctr = arra1.length,
        temp,
        index;

    // While there are elements in the array
    while (ctr > 0) {
        // Pick a random index
        index = Math.floor(Math.random() * ctr);
        // Decrease ctr by 1
        ctr--;
        // And swap the last element with it
        temp = arra1[ctr];
        arra1[ctr] = arra1[index];
        arra1[index] = temp;
    }
    return arra1;
}

var KTDatatableJsonRemoteDemo = function () {
    // Private functions

    // basic demo
    var demo = function () {
        var datatable = $("#kt_datatable_service_rovider").KTDatatable({
            // datasource definition
            data: {
                type: "local",
                source: shuffle(allUsersJson),
                pageSize: 10
            },

            // layout definition
            layout: {
                scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                footer: false // display/hide footer
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $("#kt_datatable_search_query"),
                key: "generalSearch"
            },

            // columns definition
            columns: [
                {
                    field: "id",
                    title: "#",
                    sortable: false,
                    width: 20,
                    type: "number",
                    selector: {
                        class: ""
                    },
                    textAlign: "center",
                    template: function(data) {
                        return (
                            '<span class="font-weight-bolder">' +
                            data.id +
                            "</span>"
                        );
                    }
                },
                {
                    field: "name",
                    title: "Name",
                    width: 200,
                    template: function(data) {
                        var number = KTUtil.getRandomInt(1, 14);
                        var number_img = KTUtil.getRandomInt(11, 29);
                        // var user_img = '100_' + number + '.jpg';
                        var user_img = "";
                        if (data.gender == "female") {
                            user_img = "female.jpg";
                        } else {
                            user_img = number_img + ".jpg";
                        }

                        var output = "";
                        if (data.profile_img_url.length != 0) {
                            output =
                                '<div class="d-flex align-items-center">\
								<div class="symbol symbol-40 symbol-sm flex-shrink-0">\
									<img class="" src="' +
                                root_url +
                                data.profile_img_url +
                                '" alt="' +
                                data.name +
                                '">\
								</div>\
								<div class="ml-4">\
									<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' +
                                data.name +
                                '</div>\
									<a href="mailto:' +
                                data.email +
                                '" class="text-muted font-weight-bold text-hover-primary">' +
                                data.email +
                                "</a>\
								</div>\
							</div>";
                        } else {
                            var stateNo = KTUtil.getRandomInt(0, 7);
                            var states = [
                                "success",
                                "primary",
                                "danger",
                                "success",
                                "warning",
                                "dark",
                                "primary",
                                "info"
                            ];
                            var state = states[stateNo];
                            var subs = data.name.match(/\b(\w)/g);

                            var acronym = subs.slice(0, 2).join("");
                            output =
                                '<div class="d-flex align-items-center">\
								<div class="symbol symbol-40 symbol-light-' +
                                state +
                                ' flex-shrink-0">\
									<span class="symbol-label font-size-h4 font-weight-bold">' +
                                acronym +
                                '</span>\
								</div>\
								<div class="ml-4">\
									<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' +
                                data.name +
                                '</div>\
									<a href="#" class="text-muted font-weight-bold text-hover-primary">' +
                                data.email +
                                "</a>\
								</div>\
							</div>";
                        }

                        return output;
                    }
                },
                {
                    field: "nationality",
                    title: "Nationality",
                    template: function(row) {
                        var output = "";
                        var _nationality = "";
                        if (row.nationality.length != 0) {
                            _nationality = row.nationality;
                        } else {
                            _nationality = "Not Specified";
                        }
                        output +=
                            '<div class="font-weight-bolder font-size-lg mb-0">' +
                            _nationality +
                            "</div>";

                        return output;
                    }
                },
                {
                    field: "reg_date",
                    title: "Reg. Date",
                    type: "date",
                    format: "MM/DD/YYYY",
                    template: function(row) {
                        var output = "";
                        var _reg_date = "";
                        var _user_type = "";
                        if (row.reg_date === null) {
                            _reg_date = "Not Specified";
                        } else {
                            _reg_date = row.reg_date;
                        }
                        if (
                            row.user_type != null ||
                            row.user_type.length != 0
                        ) {
                            _user_type = row.user_type;
                        } else {
                            _user_type = "Not Specified";
                        }
                        var status = {
                            1: {
                                title: "Approve",
                                class: " label-light-success"
                            },
                            2: {
                                title: "Pending",
                                class: " label-light-warning"
                            }
                        };
                        var index = KTUtil.getRandomInt(1, 4);

                        output +=
                            '<div class="font-weight-bolder text-primary mb-0">' +
                            _reg_date +
                            "</div>";
                        output +=
                            '<div class="text-muted">' + _user_type + "</div>";

                        return output;
                    }
                },
                {
                    field: "phone",
                    title: "Phone",
                    template: function(row) {
                        var _phone = "";
                        if (row.phone.length != 0) {
                            _phone = row.phone;
                        } else {
                            _phone = "Not Specified";
                        }

                        return _phone;
                    }
                },
                {
                    field: "status",
                    title: "Status",
                    // callback function support for column rendering
                    template: function(row) {
                        var status_var = {
                            Pending: {
                                title: "Pending",
                                class: " label-light-primary"
                            },
                            Suspended: {
                                title: "Canceled",
                                class: " label-light-danger"
                            },
                            Approved: {
                                title: "Success",
                                class: " label-light-success"
                            },
                            Not_specified: {
                                title: "Not specified",
                                class: " label-light-info"
                            },
                            Blocked: {
                                title: "Danger",
                                class: " label-light-danger"
                            },
                            Reported: {
                                title: "Warning",
                                class: " label-light-warning"
                            }
                        };

                        var st_class = "";
                        var st_name = "";
                        if (row.status) {
                            st_class = status_var[row.status].class;
                            st_name = row.status;
                        } else {
                            st_class = status_var.Not_specified.class;
                            st_name = status_var.Not_specified.title;
                        }
                        return (
                            '<span class="label label-lg font-weight-bold ' +
                            st_class +
                            ' label-inline">' +
                            st_name +
                            "</span>"
                        );
                    }
                },
                {
                    field: "Actions",
                    title: "Actions",
                    sortable: false,
                    width: 125,
                    autoHide: false,
                    overflow: "visible",
                    template: function(row) {
                        return (
                            '\
                            <a href="' +
                            row.id +
                            '" class="btn btn-sm btn-clean btn-icon mr-2">\
                                <i class="ki ki-eye icon-md"></i>\
                            </a>\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
                            <span class="svg-icon svg-icon-md">\
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                    </g>\
                                </svg>\
                            </span>\
                        </a>\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                            <span class="svg-icon svg-icon-md">\
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                                    </g>\
                                </svg>\
                            </span>\
                        </a>\
                    '
                        );
                    }
                }
            ]
        });

        // $('#kt_datatable_search_status').on('change', function () {
        //     datatable.search($(this).val().toLowerCase(), 'Status');
        // });

        $('#kt_datatable_search_type').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    };

    return {
        // public functions
        init: function () {
            demo();
        }
    };
}();

jQuery(document).ready(function () {
    KTDatatableJsonRemoteDemo.init();
});
