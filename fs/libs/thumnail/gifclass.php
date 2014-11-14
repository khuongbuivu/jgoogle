<?php
/* 
Create by 	giaiphapthuonghieu.org@gmail.com 
Author 		Linh Nguyen admin giaiphapthuonghieu.vn
*/
Class GIFDecoder { 
    var $GIF_TransparentR =  -1; 
    var $GIF_TransparentG =  -1; 
    var $GIF_TransparentB =  -1; 
    var $GIF_TransparentI =   0; 

    var $GIF_buffer = Array ( ); 
    var $GIF_arrays = Array ( ); 
    var $GIF_delays = Array ( ); 
    var $GIF_dispos = Array ( ); 
    var $GIF_stream = ""; 
    var $GIF_string = ""; 
    var $GIF_bfseek =  0; 
    var $GIF_anloop =  0; 

    var $GIF_screen = Array ( ); 
    var $GIF_global = Array ( ); 
    var $GIF_sorted; 
    var $GIF_colorS; 
    var $GIF_colorC; 
    var $GIF_colorF; 
    function GIFDecoder ( $GIF_pointer ) { 
        $this->GIF_stream = $GIF_pointer; 

        GIFDecoder::GIFGetByte ( 6 ); 
        GIFDecoder::GIFGetByte ( 7 ); 

        $this->GIF_screen = $this->GIF_buffer; 
        $this->GIF_colorF = $this->GIF_buffer [ 4 ] & 0x80 ? 1 : 0; 
        $this->GIF_sorted = $this->GIF_buffer [ 4 ] & 0x08 ? 1 : 0; 
        $this->GIF_colorC = $this->GIF_buffer [ 4 ] & 0x07; 
        $this->GIF_colorS = 2 << $this->GIF_colorC; 

        if ( $this->GIF_colorF == 1 ) { 
            GIFDecoder::GIFGetByte ( 3 * $this->GIF_colorS ); 
            $this->GIF_global = $this->GIF_buffer; 
        } 
        for ( $cycle = 1; $cycle; ) { 
            if ( GIFDecoder::GIFGetByte ( 1 ) ) { 
                switch ( $this->GIF_buffer [ 0 ] ) { 
                    case 0x21: 
                        GIFDecoder::GIFReadExtensions ( ); 
                        break; 
                    case 0x2C: 
                        GIFDecoder::GIFReadDescriptor ( ); 
                        break; 
                    case 0x3B: 
                        $cycle = 0; 
                        break; 
                } 
            } 
            else { 
                $cycle = 0; 
            } 
        } 
    } 
    /* 
    ::::::::::::::::::::::::::::::::::::::::::::::::::: 
    :: 
    ::    GIFReadExtension ( ) 
    :: 
    */ 
    function GIFReadExtensions ( ) { 
        GIFDecoder::GIFGetByte ( 1 ); 
        if ( $this->GIF_buffer [ 0 ] == 0xff ) { 
            for ( ; ; ) { 
                GIFDecoder::GIFGetByte ( 1 ); 
                if ( ( $u = $this->GIF_buffer [ 0 ] ) == 0x00 ) { 
                    break; 
                } 
                GIFDecoder::GIFGetByte ( $u ); 
                if ( $u == 0x03 ) { 
                    $this->GIF_anloop = ( $this->GIF_buffer [ 1 ] | $this->GIF_buffer [ 2 ] << 8 ); 
                } 
            } 
        } 
        else { 
            for ( ; ; ) { 
                GIFDecoder::GIFGetByte ( 1 ); 
                if ( ( $u = $this->GIF_buffer [ 0 ] ) == 0x00 ) { 
                    break; 
                } 
                GIFDecoder::GIFGetByte ( $u ); 
                if ( $u == 0x04 ) { 
                    if ( $this->GIF_buffer [ 4 ] & 0x80 ) { 
                        $this->GIF_dispos [ ] = ( $this->GIF_buffer [ 0 ] >> 2 ) - 1; 
                    } 
                    else { 
                        $this->GIF_dispos [ ] = ( $this->GIF_buffer [ 0 ] >> 2 ) - 0; 
                    } 
                    $this->GIF_delays [ ] = ( $this->GIF_buffer [ 1 ] | $this->GIF_buffer [ 2 ] << 8 ); 
                    if ( $this->GIF_buffer [ 3 ] ) { 
                        $this->GIF_TransparentI = $this->GIF_buffer [ 3 ]; 
                    } 
                } 
            } 
        } 
    } 
    /* 
    ::::::::::::::::::::::::::::::::::::::::::::::::::: 
    :: 
    ::    GIFReadExtension ( ) 
    :: 
    */ 
    function GIFReadDescriptor ( ) { 
        $GIF_screen    = Array ( ); 

        GIFDecoder::GIFGetByte ( 9 ); 
        $GIF_screen = $this->GIF_buffer; 
        $GIF_colorF = $this->GIF_buffer [ 8 ] & 0x80 ? 1 : 0; 
        if ( $GIF_colorF ) { 
            $GIF_code = $this->GIF_buffer [ 8 ] & 0x07; 
            $GIF_sort = $this->GIF_buffer [ 8 ] & 0x20 ? 1 : 0; 
        } 
        else { 
            $GIF_code = $this->GIF_colorC; 
            $GIF_sort = $this->GIF_sorted; 
        } 
        $GIF_size = 2 << $GIF_code; 
        $this->GIF_screen [ 4 ] &= 0x70; 
        $this->GIF_screen [ 4 ] |= 0x80; 
        $this->GIF_screen [ 4 ] |= $GIF_code; 
        if ( $GIF_sort ) { 
            $this->GIF_screen [ 4 ] |= 0x08; 
        } 
        /* 
         * 
         * GIF Data Begin 
         * 
         */ 
        if ( $this->GIF_TransparentI ) { 
            $this->GIF_string = "GIF89a"; 
        } 
        else { 
            $this->GIF_string = "GIF87a"; 
        } 
        GIFDecoder::GIFPutByte ( $this->GIF_screen ); 
        if ( $GIF_colorF == 1 ) { 
            GIFDecoder::GIFGetByte ( 3 * $GIF_size ); 
            if ( $this->GIF_TransparentI ) { 
                $this->GIF_TransparentR = $this->GIF_buffer [ 3 * $this->GIF_TransparentI + 0 ]; 
                $this->GIF_TransparentG = $this->GIF_buffer [ 3 * $this->GIF_TransparentI + 1 ]; 
                $this->GIF_TransparentB = $this->GIF_buffer [ 3 * $this->GIF_TransparentI + 2 ]; 
            } 
            GIFDecoder::GIFPutByte ( $this->GIF_buffer ); 
        } 
        else { 
            if ( $this->GIF_TransparentI ) { 
                $this->GIF_TransparentR = $this->GIF_global [ 3 * $this->GIF_TransparentI + 0 ]; 
                $this->GIF_TransparentG = $this->GIF_global [ 3 * $this->GIF_TransparentI + 1 ]; 
                $this->GIF_TransparentB = $this->GIF_global [ 3 * $this->GIF_TransparentI + 2 ]; 
            } 
            GIFDecoder::GIFPutByte ( $this->GIF_global ); 
        } 
        if ( $this->GIF_TransparentI ) { 
            $this->GIF_string .= "!\xF9\x04\x1\x0\x0". chr ( $this->GIF_TransparentI ) . "\x0"; 
        } 
        $this->GIF_string .= chr ( 0x2C ); 
        $GIF_screen [ 8 ] &= 0x40; 
        GIFDecoder::GIFPutByte ( $GIF_screen ); 
        GIFDecoder::GIFGetByte ( 1 ); 
        GIFDecoder::GIFPutByte ( $this->GIF_buffer ); 
        for ( ; ; ) { 
            GIFDecoder::GIFGetByte ( 1 ); 
            GIFDecoder::GIFPutByte ( $this->GIF_buffer ); 
            if ( ( $u = $this->GIF_buffer [ 0 ] ) == 0x00 ) { 
                break; 
            } 
            GIFDecoder::GIFGetByte ( $u ); 
            GIFDecoder::GIFPutByte ( $this->GIF_buffer ); 
        } 
        $this->GIF_string .= chr ( 0x3B ); 
        /* 
         * 
         * GIF Data End 
         * 
         */ 
        $this->GIF_arrays [ ] = $this->GIF_string; 
    } 
    /* 
    ::::::::::::::::::::::::::::::::::::::::::::::::::: 
    :: 
    ::    GIFGetByte ( $len ) 
    :: 
    */ 
    function GIFGetByte ( $len ) { 
        $this->GIF_buffer = Array ( ); 

        for ( $i = 0; $i < $len; $i++ ) { 
            if ( $this->GIF_bfseek > strlen ( $this->GIF_stream ) ) { 
                return 0; 
            } 
            $this->GIF_buffer [ ] = ord ( $this->GIF_stream { $this->GIF_bfseek++ } ); 
        } 
        return 1; 
    } 
    /* 
    ::::::::::::::::::::::::::::::::::::::::::::::::::: 
    :: 
    ::    GIFPutByte ( $bytes ) 
    :: 
    */ 
    function GIFPutByte ( $bytes ) { 
        foreach ( $bytes as $byte ) { 
            $this -> GIF_string .= chr ( $byte ); 
        } 
    } 
    /* 
    ::::::::::::::::::::::::::::::::::::::::::::::::::: 
    :: 
    ::    PUBLIC FUNCTIONS 
    :: 
    :: 
    ::    GIFGetFrames ( ) 
    :: 
    */ 
    function GIFGetFrames ( ) { 
        return ( $this->GIF_arrays ); 
    } 
    /* 
    ::::::::::::::::::::::::::::::::::::::::::::::::::: 
    :: 
    ::    GIFGetDelays ( ) 
    :: 
    */ 
    function GIFGetDelays ( ) { 
        return ( $this->GIF_delays ); 
    } 
    /* 
    ::::::::::::::::::::::::::::::::::::::::::::::::::: 
    :: 
    ::    GIFGetLoop ( ) 
    :: 
    */ 
    function GIFGetLoop ( ) { 
        return ( $this->GIF_anloop ); 
    } 
    /* 
    ::::::::::::::::::::::::::::::::::::::::::::::::::: 
    :: 
    ::    GIFGetDisposal ( ) 
    :: 
    */ 
    function GIFGetDisposal ( ) { 
        return ( $this->GIF_dispos ); 
    } 
    /* 
    ::::::::::::::::::::::::::::::::::::::::::::::::::: 
    :: 
    ::    GIFGetTransparentR ( ) 
    :: 
    */ 
    function GIFGetTransparentR ( ) { 
        return ( $this->GIF_TransparentR ); 
    } 
    /* 
    ::::::::::::::::::::::::::::::::::::::::::::::::::: 
    :: 
    ::    GIFGetTransparentG ( ) 
    :: 
    */ 
    function GIFGetTransparentG ( ) { 
        return ( $this->GIF_TransparentG ); 
    } 
    /* 
    ::::::::::::::::::::::::::::::::::::::::::::::::::: 
    :: 
    ::    GIFGetTransparentB ( ) 
    :: 
    */ 
    function GIFGetTransparentB ( ) { 
        return ( $this->GIF_TransparentB ); 
    } 
} 

Class GIFEncoder {
	var $GIF = "GIF89a";		/* GIF header 6 bytes	*/
	var $VER = "GIFEncoder V2.05";	/* Encoder version		*/

	var $BUF = Array ( );
	var $LOP =  0;
	var $DIS =  2;
	var $COL = -1;
	var $IMG = -1;

	var $ERR = Array (
		ERR00=>"Does not supported function for only one image!",
		ERR01=>"Source is not a GIF image!",
		ERR02=>"Unintelligible flag ",
		ERR03=>"Does not make animation from animated GIF source",
	);

	/*
	:::::::::::::::::::::::::::::::::::::::::::::::::::
	::
	::	GIFEncoder...
	::
	*/
	function GIFEncoder	(
							$GIF_src, $GIF_dly, $GIF_lop, $GIF_dis,
							$GIF_red, $GIF_grn, $GIF_blu, $GIF_mod
						) {
		if ( ! is_array ( $GIF_src ) && ! is_array ( $GIF_tim ) ) {
			printf	( "%s: %s", $this->VER, $this->ERR [ 'ERR00' ] );
			exit	( 0 );
		}
		$this->LOP = ( $GIF_lop > -1 ) ? $GIF_lop : 0;
		$this->DIS = ( $GIF_dis > -1 ) ? ( ( $GIF_dis < 3 ) ? $GIF_dis : 3 ) : 2;
		$this->COL = ( $GIF_red > -1 && $GIF_grn > -1 && $GIF_blu > -1 ) ?
						( $GIF_red | ( $GIF_grn << 8 ) | ( $GIF_blu << 16 ) ) : -1;

		for ( $i = 0; $i < count ( $GIF_src ); $i++ ) {
			
		
			if ( strToLower ( $GIF_mod ) == "url" ) {
				$this->BUF [ ] = fread ( fopen ( $GIF_src [ $i ], "rb" ), filesize ( $GIF_src [ $i ] ) );
			}
			else if ( strToLower ( $GIF_mod ) == "bin" ) {
				$this->BUF [ ] = $GIF_src [ $i ];
			}
			else {
				printf	( "%s: %s ( %s )!", $this->VER, $this->ERR [ 'ERR02' ], $GIF_mod );
				exit	( 0 );
			}
			if ( substr ( $this->BUF [ $i ], 0, 6 ) != "GIF87a" && substr ( $this->BUF [ $i ], 0, 6 ) != "GIF89a" ) {
				printf	( "%s: %d %s", $this->VER, $i, $this->ERR [ 'ERR01' ] );
				exit	( 0 );
			}
			for ( $j = ( 13 + 3 * ( 2 << ( ord ( $this->BUF [ $i ] { 10 } ) & 0x07 ) ) ), $k = TRUE; $k; $j++ ) {
				switch ( $this->BUF [ $i ] { $j } ) {
					case "!":
						if ( ( substr ( $this->BUF [ $i ], ( $j + 3 ), 8 ) ) == "NETSCAPE" ) {
							printf	( "%s: %s ( %s source )!", $this->VER, $this->ERR [ 'ERR03' ], ( $i + 1 ) );
							exit	( 0 );
						}
						break;
					case ";":
						$k = FALSE;
						break;
				}
			}
		}
		GIFEncoder::GIFAddHeader ( );
		for ( $i = 0; $i < count ( $this->BUF ); $i++ ) {
			GIFEncoder::GIFAddFrames ( $i, $GIF_dly [ $i ] );
		}
		GIFEncoder::GIFAddFooter ( );
	}
	/*
	:::::::::::::::::::::::::::::::::::::::::::::::::::
	::
	::	GIFAddHeader...
	::
	*/
	function GIFAddHeader ( ) {
		$cmap = 0;

		if ( ord ( $this->BUF [ 0 ] { 10 } ) & 0x80 ) {
			$cmap = 3 * ( 2 << ( ord ( $this->BUF [ 0 ] { 10 } ) & 0x07 ) );

			$this->GIF .= substr ( $this->BUF [ 0 ], 6, 7		);
			$this->GIF .= substr ( $this->BUF [ 0 ], 13, $cmap	);
			$this->GIF .= "!\377\13NETSCAPE2.0\3\1" . GIFEncoder::GIFWord ( $this->LOP ) . "\0";
		}
	}
	/*
	:::::::::::::::::::::::::::::::::::::::::::::::::::
	::
	::	GIFAddFrames...
	::
	*/
	function GIFAddFrames ( $i, $d ) {

		$Locals_str = 13 + 3 * ( 2 << ( ord ( $this->BUF [ $i ] { 10 } ) & 0x07 ) );

		$Locals_end = strlen ( $this->BUF [ $i ] ) - $Locals_str - 1;
		$Locals_tmp = substr ( $this->BUF [ $i ], $Locals_str, $Locals_end );

		$Global_len = 2 << ( ord ( $this->BUF [ 0  ] { 10 } ) & 0x07 );
		$Locals_len = 2 << ( ord ( $this->BUF [ $i ] { 10 } ) & 0x07 );

		$Global_rgb = substr ( $this->BUF [ 0  ], 13,
							3 * ( 2 << ( ord ( $this->BUF [ 0  ] { 10 } ) & 0x07 ) ) );
		$Locals_rgb = substr ( $this->BUF [ $i ], 13,
							3 * ( 2 << ( ord ( $this->BUF [ $i ] { 10 } ) & 0x07 ) ) );

		$Locals_ext = "!\xF9\x04" . chr ( ( $this->DIS << 2 ) + 0 ) .
						chr ( ( $d >> 0 ) & 0xFF ) . chr ( ( $d >> 8 ) & 0xFF ) . "\x0\x0";

		if ( $this->COL > -1 && ord ( $this->BUF [ $i ] { 10 } ) & 0x80 ) {
			for ( $j = 0; $j < ( 2 << ( ord ( $this->BUF [ $i ] { 10 } ) & 0x07 ) ); $j++ ) {
				if	(
						ord ( $Locals_rgb { 3 * $j + 0 } ) == ( ( $this->COL >> 16 ) & 0xFF ) &&
						ord ( $Locals_rgb { 3 * $j + 1 } ) == ( ( $this->COL >>  8 ) & 0xFF ) &&
						ord ( $Locals_rgb { 3 * $j + 2 } ) == ( ( $this->COL >>  0 ) & 0xFF )
					) {
					$Locals_ext = "!\xF9\x04" . chr ( ( $this->DIS << 2 ) + 1 ) .
									chr ( ( $d >> 0 ) & 0xFF ) . chr ( ( $d >> 8 ) & 0xFF ) . chr ( $j ) . "\x0";
					break;
				}
			}
		}
		switch ( $Locals_tmp { 0 } ) {
			case "!":
				$Locals_img = substr ( $Locals_tmp, 8, 10 );
				$Locals_tmp = substr ( $Locals_tmp, 18, strlen ( $Locals_tmp ) - 18 );
				break;
			case ",":
				$Locals_img = substr ( $Locals_tmp, 0, 10 );
				$Locals_tmp = substr ( $Locals_tmp, 10, strlen ( $Locals_tmp ) - 10 );
				break;
		}
		if ( ord ( $this->BUF [ $i ] { 10 } ) & 0x80 && $this->IMG > -1 ) {
			if ( $Global_len == $Locals_len ) {
				if ( GIFEncoder::GIFBlockCompare ( $Global_rgb, $Locals_rgb, $Global_len ) ) {
					$this->GIF .= ( $Locals_ext . $Locals_img . $Locals_tmp );
				}
				else {
					$byte  = ord ( $Locals_img { 9 } );
					$byte |= 0x80;
					$byte &= 0xF8;
					$byte |= ( ord ( $this->BUF [ 0 ] { 10 } ) & 0x07 );
					$Locals_img { 9 } = chr ( $byte );
					$this->GIF .= ( $Locals_ext . $Locals_img . $Locals_rgb . $Locals_tmp );
				}
			}
			else {
				$byte  = ord ( $Locals_img { 9 } );
				$byte |= 0x80;
				$byte &= 0xF8;
				$byte |= ( ord ( $this->BUF [ $i ] { 10 } ) & 0x07 );
				$Locals_img { 9 } = chr ( $byte );
				$this->GIF .= ( $Locals_ext . $Locals_img . $Locals_rgb . $Locals_tmp );
			}
		}
		else {
			$this->GIF .= ( $Locals_ext . $Locals_img . $Locals_tmp );
		}
		$this->IMG  = 1;
	}
	/*
	:::::::::::::::::::::::::::::::::::::::::::::::::::
	::
	::	GIFAddFooter...
	::
	*/
	function GIFAddFooter ( ) {
		$this->GIF .= ";";
	}
	/*
	:::::::::::::::::::::::::::::::::::::::::::::::::::
	::
	::	GIFBlockCompare...
	::
	*/
	function GIFBlockCompare ( $GlobalBlock, $LocalBlock, $Len ) {

		for ( $i = 0; $i < $Len; $i++ ) {
			if	(
					$GlobalBlock { 3 * $i + 0 } != $LocalBlock { 3 * $i + 0 } ||
					$GlobalBlock { 3 * $i + 1 } != $LocalBlock { 3 * $i + 1 } ||
					$GlobalBlock { 3 * $i + 2 } != $LocalBlock { 3 * $i + 2 }
				) {
					return ( 0 );
			}
		}

		return ( 1 );
	}
	/*
	:::::::::::::::::::::::::::::::::::::::::::::::::::
	::
	::	GIFWord...
	::
	*/
	function GIFWord ( $int ) {
		return ( chr ( $int & 0xFF ) . chr ( ( $int >> 8 ) & 0xFF ) );
	}
	/*
	:::::::::::::::::::::::::::::::::::::::::::::::::::
	::
	::	GetAnimation...
	::
	*/
	function GetAnimation ( ) {
		return ( $this->GIF );
	}
}
function scaleImageFile($fileSrc, $w, $h, $saveTo, $resizemethod = 1){
	$delays = array(5);
	
	if(file_exists($fileSrc) && is_numeric($w) && is_numeric($h)) {
		if(list($width, $height, $type, $attr) = getimagesize($fileSrc)){
	

			if($type == 1 && is_ani($fileSrc)){
				$gif = new GIFDecoder(file_get_contents($fileSrc));
				$delays = $gif->GIFGetDelays();
				$oldimg_a = $gif->GIFGetFrames();
				if(sizeof($oldimg_a) <= 0) return false;
				
				for($i = 0; $i < sizeof($oldimg_a); $i++){
					$oldimg_a[$i] = imagecreatefromstring($oldimg_a[$i]);
				}
				
			}else{
			    if(! ($oldimg = loadImage($fileSrc, $type))) return false;
				$oldimg_a = array($oldimg);
			}
			$newimg_a = array();
			
			
			foreach($oldimg_a as $oldimg){
				$newimg = null;
	
				if($resizemethod == 4){
					$ratio = 1.0;
					$ratio_w = $width / $w;
					$ratio_h = $height / $h;
					$ratio = ($ratio_h < $ratio_w ? $ratio_h : $ratio_w);
					$neww = intval($width / $ratio);
					$newh = intval($height / $ratio);
					$tempimg = imagecreatetruecolor($neww, $newh);
					imagecopyresampled($tempimg, $oldimg, 0, 0, 0, 0, $neww, $newh, $width, $height);
					$clipw = 0; $cliph = 0;
					if($neww > $w) $clipw = $neww - $w;
					if($newh > $h) $cliph = $newh - $h;
	
	
					$cliptop = floor($cliph / 2);
					$clipleft = floor($clipw / 2);
					$newimg = imagecreatetruecolor($w, $h);
					imagecopy($newimg, $tempimg, 0, 0, $clipleft, $cliptop, $w, $h);
				}else if($resizemethod == 3){
					$newimg = imagecreatetruecolor($w, $h);
					imagecopyresampled($newimg, $oldimg, 0, 0, 0, 0, $w, $h, $width, $height);
				}else if($resizemethod == 2){
					$ratio = 1.0;
					$ratio_w = $width / $w;
					$ratio_h = $height / $h;
					$ratio = ($ratio_h > $ratio_w ? $ratio_h : $ratio_w);
					$newimg = imagecreatetruecolor(intval($width / $ratio), intval($height / $ratio));
					imagecopyresampled($newimg, $oldimg, 0, 0, 0, 0, intval($width / $ratio), intval($height / $ratio), $width, $height);
				}else{
					$ratio = 1.0;
					if($width > $w || $height > $h){
						$ratio = $width / $w;
						if(($height / $h) > $ratio) $ratio = $height / $h;	
					}
					$newimg = imagecreatetruecolor(intval($width / $ratio), intval($height / $ratio));
					imagecopyresampled($newimg, $oldimg, 0, 0, 0, 0, intval($width / $ratio), intval($height / $ratio), $width, $height);
				}
				array_push($newimg_a, $newimg);
			}

			if(sizeof($newimg_a) > 1){
				$newa = array();
				foreach($newimg_a as $i){
					ob_start();
					imagegif($i);
					$gifdata = ob_get_clean();
					array_push($newa, $gifdata);
				}

				$gifmerge = new GIFEncoder	(
							$newa,
							$delays,
							999,
							2,
							0, 0, 0,
							"bin"
					);	
				FWrite ( FOpen ( $saveTo, "wb" ), $gifmerge->GetAnimation ( ) );
	        }else{
		        outputImage($newimg, $saveTo);
			}            

            
	        foreach($newimg_a as $newimg){
	        	imagedestroy($newimg);
	        }
            return true;
            
		} else return false;
	}
	return false;
}


function loadImage($fileSrc, $imgType){
    switch ($imgType){
        case 1:   //   gif
            return imagecreatefromgif($fileSrc);
        case 2:   //   jpeg
            return imagecreatefromjpeg($fileSrc);
        case 3:  //   png
            return imagecreatefrompng($fileSrc);
    }
    return false;
}

function outputImage($img, $saveTo){
    if(strlen($saveTo) > 0){
        imagejpeg($img, $saveTo, 90);
    }

    return true;
}


function is_ani($filename) {
	return (bool)preg_match('/\x00\x21\xF9\x04.{4}\x00(\x2C|\x21)/s', file_get_contents($filename), $m);
}