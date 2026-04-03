import $ from 'jquery';
window.$ = window.jQuery = $;

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

window.toastr = toastr;

toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: "toast-top-right",
};

import Swal from 'sweetalert2';
window.Swal = Swal;

import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'admin-lte/dist/js/adminlte.min.js';
import 'overlayscrollbars';

import 'bootstrap-icons/font/bootstrap-icons.css';

import 'jquery-validation/dist/jquery.validate.min.js';
import 'jquery-validation/dist/additional-methods.min.js';

import 'datatables.net-bs5';
import 'datatables.net-bs5/css/dataTables.bootstrap5.min.css';

import './common.js';
import '../../resources/js/user/common.js';

