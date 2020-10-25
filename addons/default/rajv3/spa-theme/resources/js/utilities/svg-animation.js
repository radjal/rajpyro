
				/**
				 * based on
				 * svganimations2.js v1.0.0
				 * http://www.codrops.com
				 *
				 * the svg path animation is based on http://24ways.org/2013/animating-vectors-with-svg/ by Brian Suda (@briansuda)
				 *
				 */
				window.animSvg = (container) => { 
					/* usage: all svg.animated will be drawn, and rendered invisble at the end of animation
					 * all svg.is-hidden in page will be have .is-hidden removed at end of animation
					 *   */
					'use strict';
						
						if(typeof container == 'undefined') container = '';
						
						
						function reset() {
                                                    
							var svgsHidden = Array.prototype.slice.call( document.querySelectorAll( container+ ' svg.animated.is-hidden' ) );
						svgsHidden.forEach( function( el, i ) { 
							el.setAttribute( 'class', el.getAttribute('class').replace('is-hidden', '') );
						} );
							var wasHidden = Array.prototype.slice.call( document.querySelectorAll(container+  ' .anim-was-hidden' ) );
						wasHidden.forEach( function( el, i ) { 
							el.setAttribute( 'class', el.getAttribute('class').replace('anim-was-hidden', 'is-hidden') );
						} ); 
                                                    /**/
						}
						
						reset(); // in case not first time
						
						
						
					window.requestAnimFrame = function(){
						return (
							window.requestAnimationFrame       || 
							window.webkitRequestAnimationFrame || 
							window.mozRequestAnimationFrame    || 
							window.oRequestAnimationFrame      || 
							window.msRequestAnimationFrame     || 
							function(/* function */ callback){
								window.setTimeout(callback, 1000 / 60);
							}
						);
					}();

					window.cancelAnimFrame = function(){
						return (
							window.cancelAnimationFrame       || 
							window.webkitCancelAnimationFrame || 
							window.mozCancelAnimationFrame    || 
							window.oCancelAnimationFrame      || 
							window.msCancelAnimationFrame     || 
							function(id){
								window.clearTimeout(id);
							}
						);
					}();
					
					var svgs = Array.prototype.slice.call( document.querySelectorAll(container+  ' svg.animated' ) ),
						hidden = Array.prototype.slice.call( document.querySelectorAll( container+ ' .is-hidden' ) ),
						current_frame = 0,
						total_frames = 60,
						path = new Array(),
						length = new Array(),
						handle = 0;

					function init() {
						[].slice.call( document.querySelectorAll(container+  ' .animated path' ) ).forEach( function( el, i ) {
							path[i] = el;
							var l = path[i].getTotalLength();
							length[i] = l;
							path[i].style.strokeDasharray = l + ' ' + l; 
							path[i].style.strokeDashoffset = l;
						} );
					}

					function draw() {
						var progress = current_frame/total_frames;
						if (progress > 1) {
							window.cancelAnimFrame(handle);
							showOnPage();
						} else {
							current_frame++;
							for(var j=0; j<path.length;j++){
								path[j].style.strokeDashoffset = Math.floor(length[j] * (1 - progress));
							}
							handle = window.requestAnimFrame(draw);
						}
					}

					function showOnPage() {
						svgs.forEach( function( el, i ) {
							el.setAttribute( 'class', el.getAttribute('class') + ' is-hidden' );
						} );
						hidden.forEach( function( el, i ) { 
							el.setAttribute( 'class', el.getAttribute('class').replace('is-hidden', 'anim-was-hidden') );
						} );
					}
				  
						function run() {
								init();
								draw();
						}
						
						
					run();

				}; 
				
			//  start
			//window.animSvg('#home');
