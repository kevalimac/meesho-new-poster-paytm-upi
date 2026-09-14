<div class="margin-top:50px;">
    <div class="success-message">

        <svg class="success-message__icon icon-checkmark" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="76" height="76" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
            <g>
                <g data-name="Layer 2">
                    <circle cx="256" cy="256" r="256" fill="#f44336" opacity="1" data-original="#f44336" class=""></circle>
                    <path fill="#ffffff" d="M348.6 391a42.13 42.13 0 0 1-30-12.42L256 316l-62.6 62.61a42.41 42.41 0 1 1-60-60L196 256l-62.61-62.6a42.41 42.41 0 0 1 60-60L256 196l62.6-62.61a42.41 42.41 0 1 1 60 60L316 256l62.61 62.6a42.41 42.41 0 0 1-30 72.4z" opacity="1" data-original="#ffffff"></path>
                </g>
            </g>
        </svg>
        <h1 class="success-message__title">Payment Failed!!</h1>
        <div class="success-message__content">
            <p>Payment unsuccessful. Please Try again.</p>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            window.location.href = '<?= base_url("/payment") ?>';
        }, 2000); // 2000 milliseconds = 2 seconds
    });
</script>
<style>
    .success-message {
        text-align: center;
        width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .success-message__icon {
        max-width: 75px;
        margin-bottom: 20px;
    }

    .success-message__title {
        color: #ed1c24;
        transform: translateY(25px);
        opacity: 0;
        transition: all 200ms ease;
    }

    .active .success-message__title {
        width: 100%;
        transform: translateY(0);
        opacity: 1;
    }

    .success-message__content {
        color: #B8BABB;
        transform: translateY(25px);
        opacity: 0;
        transition: all 200ms ease;
        transition-delay: 50ms;
    }

    .active .success-message__content {
        transform: translateY(0);
        opacity: 1;
    }

    .icon-checkmark circle {
        fill: #ed1c24;
        transform-origin: 50% 50%;
        transform: scale(0);
        transition: transform 200ms cubic-bezier(0.22, 0.96, 0.38, 0.98);
    }

    .icon-checkmark path {
        transition: stroke-dashoffset 350ms ease;
        transition-delay: 100ms;
    }

    .active .icon-checkmark circle {
        transform: scale(1);
    }
</style>

<script>
    function PathLoader(el) {
        this.el = el;
        this.strokeLength = el.getTotalLength();

        // set dash offset to 0
        this.el.style.strokeDasharray =
            this.el.style.strokeDashoffset = this.strokeLength;
    }

    PathLoader.prototype._draw = function(val) {
        this.el.style.strokeDashoffset = this.strokeLength * (1 - val);
    }

    PathLoader.prototype.setProgress = function(val, cb) {
        this._draw(val);
        if (cb && typeof cb === 'function') cb();
    }

    PathLoader.prototype.setProgressFn = function(fn) {
        if (typeof fn === 'function') fn(this);
    }

    var body = document.body,
        svg = document.querySelector('svg path');

    if (svg !== null) {
        svg = new PathLoader(svg);

        setTimeout(function() {
            document.body.classList.add('active');
            svg.setProgress(1);
        }, 200);
    }

    document.addEventListener('click', function() {

        if (document.body.classList.contains('active')) {
            document.body.classList.remove('active');
            svg.setProgress(0);
            return;
        }
        document.body.classList.add('active');
        svg.setProgress(1);
    });
</script>