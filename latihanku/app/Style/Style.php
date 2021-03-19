<?php
namespace app\Style;

class Style extends \app\BaseClass\BaseClass {

	public function getStyle($page)
	{
		$this->page = $page;

		switch($this->page):
			case "home":
			echo "
			<style>
			body {
			  overflow-x: hidden;
			  font: 100%/1.5 system-ui, sans-serif;
			}
			fieldset{
				width: 70%;
			}
			main {
				max-width: 600px;
			  	margin-left: auto;
			  	margin-right: auto;
			}
			.container{
			  width: 100vw;
			  position: relative;
			  left: 50%;
			  right: 50%;
			  margin-left: -45vw;
			  margin-right: -50vw;
			}
			.row{
			}

		     .hasil{
		      color:salmon;
		      font-size:25px;
		      font-weight:bold;
		           }
		      .hasil-ganjil{
		       color:orange;
		       font-size:25px;
		       font-weight:bold,italic;
		           }

		      .hasil-genap{
		       color:salmon;
		       font-size:25px;
		       font-weight:bold;
		           }

		      .hasil-err{
		       color:#CC0000;
		       font-size:25px;
		       font-weight:bold,italic;
		           }

		      .persen{
		       color:orange;
		       font-size:25px;
		       font-weight:bold;
		           }
		    </style>
			";
			break;
			default:
			echo "Style tidak tersedia";
		endswitch;
	}
}