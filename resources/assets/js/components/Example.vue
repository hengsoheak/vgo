<template>
    <div class="form-group">
        <div class="col-lg-10 col-md-10 sol-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0">
            <div class="row">

                <div class="col-xs-4 col-sm-2">
                    <button class="btn btn-block btn-social btn-facebook" type="submit">
                        <i class="fa fa-home"></i>CamVgo Login
                    </button>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a class="btn btn-block btn-social btn-facebook" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-md']);">
                        <i class="fa fa-facebook"></i>Sign in with Facebook
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a class="btn btn-block btn-social btn-twitter" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-twitter']);">
                        <span class="fa fa-twitter"></span> Sign in with Twitter
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a class="btn btn-block btn-social btn-google" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-google']);">
                        <span class="fa fa-google"></span> Sign in with Google
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a class="btn btn-block btn-social btn-instagram" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-instagram']);">
                        <span class="fa fa-instagram"></span> Sign in with Instagram
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a class="btn btn-block btn-social btn-vimeo" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-vimeo']);">
                        <span class="fa fa-vimeo-square"></span> Sign in with Vimeo
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        mounted() {
            console.log('Component Example not work.');
        }
    }
</script>
