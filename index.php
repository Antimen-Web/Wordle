<!DOCTYPE html>
<html lang="en"> 
<head>    
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Corgli</title>
	<link rel="apple-touch-icon" sizes="128x128" href="icons/icon-128.png">
	<link rel="apple-touch-icon" sizes="256x256" href="icons/icon-256.png">
	<link rel="apple-touch-icon" sizes="512x512" href="icons/icon-512.png">
	<link rel="icon" type="image/png" href="icons/icon-512.png">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="wordle.css">
</head>
<body>
	<section class="game">
		<div class="container_game">
			<header>
			    <div class="logo">
			    	<a href="/"><img src="images/logo.png" alt="Wordle Game"></a>
			    </div>
			    <div class="cont flex">
			    	<a class="lang mini_modal_link" onclick="langsBtn();">
			    		<img src="images/United-States.png" width="16" height="16">
			    		EN
			    	</a>
			    	<button type="button" class="generator mini_modal_link" onclick="generatorBtnFunc();">
			        	W+
			        </button>
			    	<button type="button" class="give_up open_alert" style="display: none;">Give up</button>
			        <div class="buttons flex">
			        	<button type="button" class="button mini_modal_link" onclick="statsBtn();">
			        		<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="signal" class="svg-inline--fa fa-signal fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
			        			<path fill="currentColor" d="M216 288h-48c-8.84 0-16 7.16-16 16v192c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V304c0-8.84-7.16-16-16-16zM88 384H40c-8.84 0-16 7.16-16 16v96c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16v-96c0-8.84-7.16-16-16-16zm256-192h-48c-8.84 0-16 7.16-16 16v288c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V208c0-8.84-7.16-16-16-16zm128-96h-48c-8.84 0-16 7.16-16 16v384c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V112c0-8.84-7.16-16-16-16zM600 0h-48c-8.84 0-16 7.16-16 16v480c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V16c0-8.84-7.16-16-16-16z"></path>
			        		</svg>
			        	</button>
			        	<button type="button" class="button mini_modal_link" onclick="tutorialBtn();">
			                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" class="svg-inline--fa fa-info-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path></svg>
			            </button>
			        </div>
			    </div>
			</header>
			<canvas id="mainCanvas"></canvas>

			<div class="tutorial">
				<div class="content">
					<div class="header">
						<h1>How to play?</h1>
						<svg class="close" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
						    <path fill="var(--color-tone-3)" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
						</svg>
					</div>
					<div class="text">
						<p>Guess the <strong>WORD</strong> in 6 attempts.</p>
						<p>Each guess must be a valid 5-letter word. Press the enter button to check.</p>
						<p>After each guess, the color of the tile will change to show how close your guess was to the word.</p>
					</div>
					<div class="examples">
						<h2>Examples</h2>

						<div class="row">
						    <div class="letter current">D</div>
						    <div class="letter">O</div>
						    <div class="letter">D</div>
						    <div class="letter">G</div>
						    <div class="letter">E</div>
						</div>
						<p>The letter <strong>D</strong> is in the word and is in the right place.</p>

						<div class="row">
						    <div class="letter">S</div>
						    <div class="letter nearly">U</div>
						    <div class="letter">G</div>
						    <div class="letter">A</div>
						    <div class="letter">R</div>
						</div>
						<p>The letter <strong>U</strong> is in the word, but in the wrong place.</p>

						<div class="row">
						    <div class="letter">S</div>
						    <div class="letter">Q</div>
						    <div class="letter">U</div>
						    <div class="letter">A</div>
						    <div class="letter wrong">D</div>
						</div>
						<p>The letter <strong>D</strong> does not appear anywhere in the word.</p>
					</div>
				</div>
			</div>
			<div class="mini_modal" id="modal_stats">
			    <div class="top">Statistics</div>
			    <div class="data">
			        <div class="cont">
			            <div class="stats flex">
			                <div class="item played">
			                    <div class="val">0</div>
			                    <div class="desc">🕹️ Games Played</div>
			                </div>
			                <div class="item win">
			                    <div class="val">0</div>
			                    <div class="desc">🏆 Games Won</div>
			                </div>
			                <div class="item percent">
			                    <div class="val">0</div>
			                    <div class="desc">📈 % of Wins</div>
			                </div>
			                <div class="item streak">
			                    <div class="val">0</div>
			                    <div class="desc">⚡️ Max Streak</div>
			                </div>
			            </div>
			            <hr>
			            <div class="block_share">
			                <div class="links flex">
			                	<a class="vk_btn" href="http://vk.com/share.php?url=URL&title=TITLE&description=DESC&image=IMG_PATH&noparse=true" target="_blank" onclick="ShareStats.vkontakte('https://wordle-game.io/','Wordle Statistics','IMG_PATH','DESC')">Vkontakte</a>
			                	<a class="twitter_btn" href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Ffiddle.jshell.net%2F_display%2F&text=&url=" target="_blank" onclick="ShareStats.twitter('https://wordle-game.io/','TITLE')">Twitter</a>
			                    <a class="facebook_btn" href="http://www.facebook.com/sharer/sharer.php?s=100&p%5Btitle%5D=TITLE&p%5Bsummary%5D=DESC&p%5Burl%5D=URL&p%5Bimages%5D%5B0%5D=IMG_PATH" target="_blank" onclick="ShareStats.facebook('https://wordle-game.io/','Wordle Statistics','IMG_PATH','DESC')">Facebook</a>
			                    <a class="whatsapp_btn" href="https://api.whatsapp.com/send?text=My%20Wordle%20Stats%3A%20%0A0%20Games%20played%2C%20%0A0%20Games%20won%2C%20%0A0%25%20of%20Games%20won%2C%20%0A0%20Max%20Streak" target="_blank" onclick="ShareStats.whatsapp('https://wordle-game.io/','TITLE')">WhatsApp</a>
			                </div>
			            </div>
			            <div class="chart">
			                <div class="main_title center">Best Tries Distribution</div>
			                <table>
			                    <tr class="tries1">
			                        <td class="number">#1</td>
			                        <td>
			                            <div class="percentage">0%</div>

			                        </td>
			                        <td class="amount">0</td>
			                    </tr>
			                    <tr class="tries2">
			                        <td class="number">#2</td>
			                        <td>
			                            <div class="percentage">0%</div>
			                        </td>
			                        <td class="amount">0</td>
			                    </tr>
			                    <tr class="tries3">
			                        <td class="number">#3</td>
			                        <td>
			                            <div class="percentage">0%</div>
			                        </td>
			                        <td class="amount">0</td>
			                    </tr>
			                    <tr class="tries4">
			                        <td class="number">#4</td>
			                        <td>
			                            <div class="percentage">0%</div>
			                        </td>
			                        <td class="amount">0</td>
			                    </tr>
			                    <tr class="tries5">
			                        <td class="number">#5</td>
			                        <td>
			                            <div class="percentage">0%</div>
			                        </td>
			                        <td class="amount">0</td>
			                    </tr>
			                    <tr class="tries6">
			                        <td class="number">#6</td>
			                        <td>
			                            <div class="percentage">0%</div>
			                        </td>
			                        <td class="amount">0</td>
			                    </tr>
			                </table>
			            </div>
			        </div>
			    </div>
			    <button type="button" class="close"></button>
			</div>
			<div class="modal_finish word_generator">
			    <div class="top lost">Wordle Generator</div>
			    <div class="data">
			        <div class="cont">
			            <div class="desc">Challenge your friend with any word 5 letters:</div>
			            <div class="line_form">
			                <div class="field"><input type="text" name="input" class="input" placeholder="Your word ..." minlength="5" maxlength="5" value=""></div>
			            </div>
			            <div class="desc valid" style="display: none;">Link Copied!</div>
			            <div class="desc not_valid" style="display: none;">Word not found</div>
			            <div class="copy_btn"><button type="button" onclick="generatorFunc();">Copy link</button></div>
			        </div>
			    </div>
			    <button type="button" class="close" onclick="generatorBtnOffFunc();"></button>
			</div>
			<div class="modal_finish poof">
			    <div class="top ">You Win!</div>
			    <div class="data">
			        <div class="cont">
			            <div class="desc" style="display: none;">The answer was:</div>
			            <div class="word" style="display: none;"><span>форум</span></div>
			            <div class="restart_btn"><button type="button" onclick="restartGame();">Restart</button></div>
			            <div class="block_share" style="">
			                <div class="links flex" style="display: flex;">
			                	<a class="vk_btn" href="http://vk.com/share.php?url=URL&title=TITLE&description=DESC&image=IMG_PATH&noparse=true" target="_blank" onclick="ShareWin.vkontakte('https://wordle-game.io/','Wordle Game','IMG_PATH','DESC')">Vkontakte</a>
			                	<a class="twitter_btn" href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Ffiddle.jshell.net%2F_display%2F&text=&url=" target="_blank" onclick="ShareWin.twitter('https://wordle-game.io/','TITLE')">Twitter</a>
			                    <a class="facebook_btn" href="http://www.facebook.com/sharer/sharer.php?s=100&p%5Btitle%5D=TITLE&p%5Bsummary%5D=DESC&p%5Burl%5D=URL&p%5Bimages%5D%5B0%5D=IMG_PATH" target="_blank" onclick="ShareWin.facebook('https://wordle-game.io/','Wordle Game','IMG_PATH','DESC')">Facebook</a>
			                    <a class="whatsapp_btn" href="https://api.whatsapp.com/send?text=My%20Wordle%20Stats%3A%20%0A0%20Games%20played%2C%20%0A0%20Games%20won%2C%20%0A0%25%20of%20Games%20won%2C%20%0A0%20Max%20Streak" target="_blank" onclick="ShareWin.whatsapp('https://wordle-game.io/','TITLE')">WhatsApp</a>
			                </div>
			            </div>
			            <div class="link puzzle" style="">
			            	<a href="javascript:void(0)">
			            		<svg class="icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="th" class="svg-inline--fa fa-th fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z"></path></svg>Copy your puzzle with emojis
			            	</a>
			            </div>
			            <div class="link challenge">
			            	<a href="javascript:void(0)">
			            		<svg class="icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="link" class="svg-inline--fa fa-link fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 0 1-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0 1 20.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0 0 20.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 0 0-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z"></path></svg>Copy link to this word
			            	</a>
			            </div>
			            <div class="link">
			            	<a href="javascript:void(0)" class="download-screenshot">
			            		<svg class="icon icon-download" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" class="svg-inline--fa fa-download fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg>Download puzzle screenshot
			            	</a>
			           </div>
			        </div>
			    </div>
			</div>
			<div class="mini_modal" id="modal_languages">
			    <div class="top">Dictionary</div>
			    <div class="data">
			        <div class="cont">
			            <div class="main_title center">Select Dictionary</div>
			            <div class="main_desc center">Select a game dictionary (opens in a new tab)</div>
			            <div class="languages flex">
			            	<a href="" class="lang_checkbox lang_checkbox_selected" target="_blank"><label class="label_check"><span class="check_text"><span class="icon"><img src="images/United-States.png" width="16" height="16"></span>English (US)</span></label></a>
			                <a href="wordle-ru" class="lang_checkbox" target="_blank"><label class="label_check"><span class="check_text"><span class="icon"><img src="images/Russia.png" width="16" height="16"></span>Русский</span></label></a>
			            </div>
			        </div>
			    </div>
			    <button type="button" class="close"></button>
			</div>
		</div>
		<div class="sharethis-inline-share-buttons st-center st-has-labels  st-inline-share-buttons st-animated" id="st-1">
		    <div class="st-total ">
		        <span class="st-label">
		        	<?php 
					  /* $host = 'localhost'; // адрес сервера
					   $db_name = 'wordle'; // имя базы данных
					   $user = 'root'; // имя пользователя
					   $password = 'root'; // пароль

					   // создание подключения к базе   
					      $connection = mysqli_connect($host, $user, $password, $db_name);

					   // текст SQL запроса, который будет передан базе
					      $query = 'SELECT * FROM `social_en`';

					   // выполняем запрос к базе данных
					      $result = mysqli_query($connection, $query);

					   // выводим полученные данные
					      while($row = $result->fetch_assoc()){
					         echo  $row['count'];
					      }

					   // закрываем соединение с базой
					      mysqli_close($connection);*/
					?>
					100
		        </span>
		        <span class="st-shares">Shares</span>
		    </div>
		    <a class="st-btn st-first vk_btn" data-network="vk" style="display: inline-block;" href="http://vk.com/share.php?url=URL&title=TITLE&description=DESC&image=IMG_PATH&noparse=true" target="_blank" onclick="Share.vkontakte('https://wordle-game.io/','Wordle Game','IMG_PATH','DESC')">
		        <img alt="vk sharing button" src="https://platform-cdn.sharethis.com/img/vk.svg">
		        <span class="st-label">Share</span>
		    </a>
		    <a class="st-btn" data-network="facebook" style="display: inline-block;" href="http://www.facebook.com/sharer/sharer.php?s=100&p%5Btitle%5D=TITLE&p%5Bsummary%5D=DESC&p%5Burl%5D=URL&p%5Bimages%5D%5B0%5D=IMG_PATH" target="_blank" onclick="Share.facebook('https://wordle-game.io/','Wordle Game','IMG_PATH','DESC')">
		        <img alt="facebook sharing button" src="https://platform-cdn.sharethis.com/img/facebook.svg">
		        <span class="st-label">Share</span>
		    </a>
		    <a class="st-btn" data-network="twitter" style="display: inline-block;" href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Ffiddle.jshell.net%2F_display%2F&text=&url=" target="_blank" onclick="Share.twitter('https://wordle-game.io/','TITLE')">
		        <img alt="twitter sharing button" src="https://platform-cdn.sharethis.com/img/twitter.svg">
		        <span class="st-label">Tweet</span>
		    </a>
		    <a class="st-btn st-last" data-network="whatsapp" style="display: inline-block;" href="https://api.whatsapp.com/send?text=My%20Wordle%20Stats%3A%20%0A0%20Games%20played%2C%20%0A0%20Games%20won%2C%20%0A0%25%20of%20Games%20won%2C%20%0A0%20Max%20Streak" target="_blank" onclick="Share.whatsapp('https://wordle-game.io/','TITLE')">
		        <img alt="whatsapp sharing button" src="https://platform-cdn.sharethis.com/img/whatsapp.svg">
		        <span class="st-label">Share</span>
		    </a>
		</div>
	</section>

	<section class="popup">
		<div class="content">
			<h1>Not enough letters!</h1>
		</div>
	</section>

	<script src="pixi.min.js"></script>
	<script src="main.js"></script>

	<script type="text/javascript">
		if (document.fonts) {
		    document.fonts.load("bold 16px 'Clear Sans'", "b").then(function() {
		        init();
		    });
		}
	</script>
</body>
</html> 