/**
 * CG Memo Module for Joomla 4.x/5.x
 *
 * @author     ConseilgGouz
 * @copyright (C) 2023 www.conseilgouz.com. All Rights Reserved.
 * @license    GNU/GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 */
/* handle CGRange field */
document.addEventListener('DOMContentLoaded', function() {
    let cgranges = document.querySelectorAll('.form-cgrange');
    for(var i=0; i< cgranges.length; i++) {
        cgranges[i].addEventListener('input',function() {
            let $id = this.getAttribute('id');
            label = document.querySelector('#cgrange-label-'+$id);
            label.innerHTML = this.value;
        })
    }
    let cgresets = document.querySelectorAll('.cgrange-reset');
    for(var i=0; i< cgresets.length; i++) {
        cgresets[i].addEventListener('click',function() {
            let $id = this.getAttribute('data');
            range = document.getElementById($id);
            range.value = 0;
            label = document.querySelector('#cgrange-label-'+$id);
            label.innerHTML = 0;
        })
    }
    let cgminus = document.querySelectorAll('.cgrange-minus');
    for(var i=0; i< cgminus.length; i++) {
        cgminus[i].addEventListener('click',function() {
            let $id = this.getAttribute('data');
            range = document.getElementById($id);
            step = parseFloat(range.getAttribute('step'));
            min = parseFloat(range.getAttribute('min'));
            range.value = parseFloat(range.value) - step;
            if (range.value < min) range.value = min;
            label = document.querySelector('#cgrange-label-'+$id);
            label.innerHTML = range.value;
        })
    }
    let cgplus = document.querySelectorAll('.cgrange-plus');
    for(var i=0; i< cgplus.length; i++) {
        cgplus[i].addEventListener('click',function() {
            let $id = this.getAttribute('data');
            range = document.getElementById($id);
            step = parseFloat(range.getAttribute('step'));
            max = parseFloat(range.getAttribute('max'));
            range.value = parseFloat(range.value) + parseFloat(step);
            if (range.value > max) range.value = max;
            label = document.querySelector('#cgrange-label-'+$id);
            label.innerHTML = range.value;
        })
    }
    // initialize
    let cglabels = document.querySelectorAll('.cgrange-label');
    for(var i=0; i< cglabels.length; i++) {
        let $id = cglabels[i].getAttribute('data');
        var value = document.querySelector('#'+$id).getAttribute('value');
        cglabels[i].innerHTML = value;
    }

})