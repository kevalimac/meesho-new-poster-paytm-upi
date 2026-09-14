<style>
    .cart-list {
        max-height: max-content;
        /* min-height: 30vh; */
    }

    .cart-product {
        border-bottom: 5px solid #eaeaf2;
    }

    .cart_page_footer {
        box-shadow: none;
        position: unset;
        border-bottom: 5px solid #eaeaf2;
    }

    .header-menu {
        display: none;
    }

    .mc_pay__total {
        padding: 5px 0;
        color: rgb(53, 53, 67);
        font-weight: 600;
        font-size: 15px;
        font-family: "Mier demi";
        text-align: left;
        line-height: 24px;
    }

    .cart__total,
    .shipping__total,
    .mc_pay__total {
        padding: 10px 0;
    }

    .cart__total {
        text-decoration: underline dotted;
        color: rgb(53, 53, 67);
        font-style: normal;
        font-weight: 400;
        font-size: 13px;
        line-height: 20px;
        font-family: "Mier book";
        margin: 0px;
        padding: 0px;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
    }

    .cart-qty {
        color: rgb(53, 53, 67);
        font-style: normal;
        font-weight: 400;
        font-size: 13px;
        font-family: "Mier book";
        white-space: nowrap;
        margin-left: 8px;
    }

    .eGwEyP {
        padding: 12px 16px;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
    }

    .dUijPM {
        display: flex;
        flex-direction: column;
        -webkit-box-pack: justify;
        justify-content: space-between;
        max-width: 50%;
        padding-right: 8px;
    }

    .dUijPM span {
        color: rgb(53, 53, 67);
        font-weight: 700;
        font-size: 17px;
        line-height: 20px;
        font-family: "Mier bold";
    }

    .dUijPM button {
        font-weight: unset;
        font-family: "Mier bold";
    }

    .ylmAj {
        color: rgb(159, 32, 137);
        cursor: pointer;
        font-style: normal;
        text-align: center;
        letter-spacing: 0.0015em;
        font-size: 13px;
        font-weight: 700;
        line-height: 16px;
        border-radius: 4px;
        background: inherit;
        border: none;
        padding: 0px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .iAFVK {
        width: 50%;
    }

    .iAFVK button {
        width: 100%;
        font-weight: 600;
        font-family: "Mier demi";
    }

    .bwHzRF {
        cursor: pointer;
        font-style: normal;
        text-align: center;
        letter-spacing: 0.0015em;
        font-size: 15px;
        line-height: 20px;
        border-radius: 4px;
        color: rgb(255, 255, 255);
        background: rgb(159, 32, 137);
        border: none;
        padding: 12px;
        font-weight: 500;
        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .ixHOyU {
        position: fixed;
        width: 100%;
        max-width: 800px;
        background-color: rgb(255, 255, 255);
        bottom: 0px;
        z-index: 1;
    }
</style>

<div id="container">
    <div style="" data-reactroot="">
        <div class="_1fhgRH max-height mb-70">
            <div data-testid="stepper-container" class="sc-geuGuN gqSLnX">
                <div class="sc-kGhOqx chtKwW">
                    <ul class="sc-bAKPPm eOmvaT">
                        <div class="sc-jZiqTT hGoFZP">
                            <div class="sc-bxSTMQ geeMAN">
                                <div data-testid="left-line" class="sc-PJClH lagJzQ"></div>
                                <div class="sc-dGHKFW cRaGaC">1</div>
                                <div data-testid="right-line" class="sc-jfdOKL bSausD"></div>
                            </div>
                            <div class="sc-jWquRx iefUco">Cart</div>
                        </div>
                        <div class="sc-jZiqTT hGoFZP">
                            <div class="sc-bxSTMQ geeMAN">
                                <div data-testid="left-line" class="sc-PJClH kHHhBS"></div>
                                <div class="sc-dGHKFW iefbLi">2</div>
                                <div data-testid="right-line" class="sc-jfdOKL bSausD"></div>
                            </div>
                            <div class="sc-jWquRx ezBHwi">Address</div>
                        </div>
                        <div class="sc-jZiqTT hGoFZP">
                            <div class="sc-bxSTMQ geeMAN">
                                <div data-testid="left-line" class="sc-PJClH kHHhBS"></div>
                                <div class="sc-dGHKFW iefbLi">3</div>
                                <div data-testid="right-line" class="sc-jfdOKL bSausD"></div>
                            </div>
                            <div class="sc-jWquRx ezBHwi">Payment</div>
                        </div>
                        <div class="sc-jZiqTT hGoFZP">
                            <div class="sc-bxSTMQ geeMAN">
                                <div data-testid="left-line" class="sc-PJClH kHHhBS"></div>
                                <div class="sc-dGHKFW iefbLi">4</div>
                                <div data-testid="right-line" class="sc-jfdOKL jSyZxf"></div>
                            </div>
                            <div class="sc-jWquRx ezBHwi">Summary</div>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="sc-bBXxYQ jMfCEJ"></div>


            <div class="card">
                <div class="cart-products-list cart-list">
                </div>
                <div class="cart__footer cart_page_footer">
                    <div class="cart__price__details">
                        <div class="cart__breakup__inner">
                            <div class="shipping__total">
                                <span class="">Shipping:</span>
                                <span class="">FREE</span>
                            </div>
                            <div class="cart__total">
                                <span class="">Total Product Price:</span>
                                <span class="cartTotalAmount">₹00.00</span>
                            </div>
                            <div class="sc-bBXxYQ jMfCEJ mt-3 mb-1"></div>
                            <div class="mc_pay__total">
                                <span class="">Order Total :</span>
                                <span class="cartTotalAmount">₹00.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sefty-banner">
                <img src="https://images.meesho.com/images/marketing/1588578650850.webp" alt="safe" class="w-100">
            </div>
            <div class="button-container flex">
                <div class="sc-fThYeS dUijPM"><span class="cartTotalAmount">₹00.00</span><button class="sc-kLLXSd ylmAj">VIEW PRICE DETAILS</button></div>
                <div class="sc-BrFsL iAFVK"><a href="<?= base_url('address');  ?>"><button class="sc-ikZpkk bwHzRF">Continue</button></a></div>
            </div>
        </div>
    </div>
</div>