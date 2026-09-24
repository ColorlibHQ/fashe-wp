/**
 * Notice for Elementor
 *
 * Shown once in the Elementor preview: asks whether to switch off Elementor's
 * default colours and fonts in favour of the theme's. No jQuery.
 *
 * @package Fashe
 */

/* global fasheElementorNotice */

(function () {
	'use strict';

	function init() {

		var style = '<style>.fashe-disable-elementor-styling{position:fixed;z-index:9999;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,.8)}.fashe-elementor-notice-wrapper{position:fixed;top:50%;left:50%;max-width:380px;border-radius:6px;color:#6d7882;background-color:#fff;text-align:center;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.fashe-elementor-notice-body{padding:10px 20px;font-size:12px;line-height:1.5}.fashe-elementor-notice-header{padding:10px 0 20px;color:#6d7882;font-size:13px;font-weight:700}.fashe-elementor-notice-buttons{border-top:1px solid #e6e9ec}.fashe-elementor-notice-buttons>a{display:inline-block;width:50%;padding:13px 0;font-size:15px;font-weight:700;text-align:center}.fashe-elementor-notice-buttons>a.fashe-do-nothing{border-right:1px solid #e6e9ec;color:#6d7882}.fashe-elementor-notice-buttons>a.fashe-disable-default-styles{color:#9b0a46}</style>';

		var dialog = style + '<div class="fashe-disable-elementor-styling">' +
			'<div class="fashe-elementor-notice-wrapper">' +
				'<div class="fashe-elementor-notice-header">fashe supports default styling for Elementor widgets</div>' +
				'<div class="fashe-elementor-notice-body">Do you want to disable Elementors\' default styles and use the theme defaults?</div>' +
				'<div class="fashe-elementor-notice-buttons">' +
					'<a href="#" class="fashe-do-nothing" data-reply="no">No</a>' +
					'<a href="#" class="fashe-disable-default-styles" data-reply="yes">Yes</a>' +
				'</div>' +
			'</div>' +
		'</div>';

		document.body.insertAdjacentHTML( 'afterbegin', dialog );

		Array.prototype.forEach.call( document.querySelectorAll( '.fashe-elementor-notice-buttons > a' ), function ( link ) {
			link.addEventListener( 'click', function () {

				var reply = link.getAttribute( 'data-reply' );
				var data = new URLSearchParams();
				data.append( 'reply', reply );
				data.append( 'nonce', fasheElementorNotice.nonce );
				data.append( 'action', 'elementor_desiable_default_style' );

				fetch( fasheElementorNotice.ajaxurl, { method: 'POST', body: data, credentials: 'same-origin' } ).then( function ( response ) {
					if ( ! response.ok ) {
						return;
					}
					if ( reply === 'yes' ) {
						parent.location.reload();
					} else {
						Array.prototype.forEach.call( document.querySelectorAll( '.fashe-disable-elementor-styling' ), fadeOutAndRemove );
					}
				} );
			} );
		} );
	}

	function fadeOutAndRemove( el ) {
		function remove() {
			if ( el.parentNode ) {
				el.parentNode.removeChild( el );
			}
		}
		if ( ! el.animate ) {
			remove();
			return;
		}
		el.animate( [ { opacity: 1 }, { opacity: 0 } ], { duration: 500, fill: 'forwards' } ).onfinish = remove;
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
}());
