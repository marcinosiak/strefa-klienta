<?php
	
	class Cart{

		private $cartId;
		private $item;
		private $format;


		public function setCartId()
		{
			$this->cartId = uniqid('cart-');
			return $this;
		}


		public function getCartId()
		{
			return $this->cartId;
		}

	}