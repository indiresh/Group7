<?php
$cherry="<p><img src=\"images/cherries.jpg\" alt=\"Cherries\" /></p>";
$bar="<p><img src=\"images/bar.jpg\" alt=\"Bar\" /></p>";
$skull="<p><img src=\"images/skull.jpg\" alt=\"Skull\" /></p>";
$seven="<p><img src=\"images/red7.jpg\" alt=\"Red7\" /></p>";
$slots = array("$cherry","$cherry","$cherry","$bar","$bar","$skull","$seven");

$one_t=rand(0,6);
$two_t=rand(0,6);
$three_t=rand(0,6);

$leftPic=$slots[$one_t];
$middlePic=$slots[$two_t];
$rightPic=$slots[$three_t];

$leftVal=($one_t+1)*100;
$middleVal=($two_t+1)*10;
$rightVal=$three_t+1;

$combVal = $leftVal + $middleVal + $rightVal;

if ($combval == 411 or $combval == 412 or $combval == 413 or $combval == 421 or $combval == 422 or $combval == 423 or $combval == 431 or $combval == 432 or 
$combval == 433 or $combval == 511 or $combval == 512 or $combval == 513 or $combval == 521 or $combval == 522 or $combval == 523 or $combval == 531 or 
$combval == 532 or $combval == 533 or $combval == 711 or $combval == 712 or $combval == 713 or $combval == 721 or $combval == 722 or $combval == 723 or 
$combval == 731 or $combval == 732 or $combval == 733 or $combval == 341 or $combval == 342 or $combval == 343 or $combval == 351 or $combval == 352 or 
$combval == 353 or $combval == 371 or $combval == 372 or $combval == 373 or $combval == 114 or $combval == 115 or $combval == 117 or $combval == 124 or 
$combval == 125 or $combval == 127 or $combval == 134 or $combval == 135 or $combval == 137 or $combval == 214 or $combval == 215 or $combval == 217 or 
$combval == 224 or $combval == 225 or $combval == 227 or $combval == 234 or $combval == 235 or $combval == 237 or $combval == 314 or $combval == 315 or 
$combval == 317 or $combval == 324 or $combval == 325 or $combval == 327 or $combval == 334 or $combval == 335 or $combval == 337 or $combval == 141 or 
$combval == 142 or $combval == 143 or $combval == 151 or $combval == 152 or $combval == 153 or $combval == 171 or $combval == 172 or $combval == 173 or 
$combval == 241 or $combval == 242 or $combval == 243 or $combval == 251 or $combval == 252 or $combval == 253 or $combval == 271 or $combval == 272 or 
$combval == 273) 
{
	+3
} 
else 
{ 
	if ($combval == 111 or $combval == 112 or $combval == 113 or $combval == 121 or $combval == 122 or $combval == 123 or $combval == 131 or $combval == 132 or 
$combval == 133 or $combval == 211 or $combval == 212 or $combval == 213 or $combval == 221 or $combval == 222 or $combval == 223 or $combval == 231 or 
$combval == 232 or $combval == 233 or $combval == 311 or $combval == 312 or $combval == 313 or $combval == 321 or $combval == 322 or $combval == 323 or 
$combval == 331 or $combval == 332 or $combval == 333)
	{
		+15
	}
	else
	{
		if($combval == 444 or $combval == 445 or $combval == 454 or $combval == 455 or $combval == 544 or $combval == 545 or $combval == 554 or $combval == 555)
		{
			+100
		}
		else
		{
			if($combVal == 666)
			{
				-666
			}
			else
			{
				if($combVal == 777)
				{
					+777
				}
				else
				{
					-5
				}
			}
		}
	}
}
?>