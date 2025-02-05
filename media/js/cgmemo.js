/**
 * CG Memo Module for Joomla 4.x/5.x
 *
 * @author     ConseilgGouz
 * @copyright (C) 2025 www.conseilgouz.com. All Rights Reserved.
 * @license    GNU/GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 */
var cgmemo_options = [];

document.addEventListener('DOMContentLoaded', function() {

mains = document.querySelectorAll('.cg-memo-note');
for(var i=0; i<mains.length; i++) {
	var $this = mains[i];
	myid = $this.getAttribute("data");
	if (typeof Joomla === 'undefined' || typeof Joomla.getOptions === 'undefined') {
		console.log('CG Memo : Joomla /Joomla.getOptions  undefined');
	} else {
		 cgmemo_options[myid] = Joomla.getOptions('mod_cg_memo_'+myid);
	}
	if (typeof cgmemo_options[myid] === 'undefined' ) {return false}
	go_cgmemo(myid,cgmemo_options[myid]);
}
})
function go_cgmemo(id,options)  {
	if (options.fontfamily != 'allthatmattersmedium') {
		WebFont.load({
			google: {
			families: [ options.fontfamily ]
			}
		})
	}
}
