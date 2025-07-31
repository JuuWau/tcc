import './bootstrap';

import Alpine from 'alpinejs';

import TomSelect from "tom-select";
import 'tom-select/dist/css/tom-select.css';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

window.toastr = toastr;

window.TomSelect = TomSelect;

window.Alpine = Alpine;

Alpine.start();

// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//     }
// });
