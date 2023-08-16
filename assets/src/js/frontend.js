/**
 * SASS
 */
import "../scss/frontend.scss";

/**
 * Components
 */
import "./components/primary-navigation.js";

/**
 * Bootstrap
 */

/* eslint-disable no-unused-vars */
// import Alert from 'bootstrap/js/dist/alert';
// import Button from 'bootstrap/js/dist/button';
// import Carousel from 'bootstrap/js/dist/carousel';
// import Collapse from 'bootstrap/js/dist/collapse';
// import Dropdown from "bootstrap/js/dist/dropdown";
// import Modal from 'bootstrap/js/dist/modal';
// import Popover from 'bootstrap/js/dist/popover';
// import Scrollspy from 'bootstrap/js/dist/scrollspy';
import Tab from "bootstrap/js/dist/tab";
// import Toast from 'bootstrap/js/dist/toast';
// import Tooltip from 'bootstrap/js/dist/tooltip';
/* eslint-enable no-unused-vars */

/**
 * Hide 'Add to cart button when CKT is selecten
 */
const paymentStandard = document.getElementById("choice_6_1_0");
const paymentCkt = document.getElementById("choice_6_1_1");
const addToCart = document.getElementsByClassName("cart");

paymentStandard.addEventListener("change", myScript);
paymentCkt.addEventListener("change", myScript);
function myScript() {
    if (document.getElementById("choice_6_1_1").checked) {
        addToCart[0].style.display = "none";
    } else {
        addToCart[0].style.display = "block";
    }
//   const ckt = document.getElementById("input_6_2_3");
//   if (ckt.checked) {
//   }
}