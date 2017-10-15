

/**
 * Actual demo
 */

var websiteDirectory = new Vue({

    el: '#website-directory',

    data: {
        terms: [],
        currentTerm: false,
        assets_posts: [],
        wpasset: '/wp-json/wp/v2/assets_post_type?per_page=99',
        terms_route: '/wp-json/wp/v2/type?per_page=99',
        showMobileMenu:false
    },
    computed: {
        root: function () {
            $output = jQuery('#assets-tpl').attr('data-root');
            if($output === ''){
                $output = document.location.href;
            }

            return $output;

        }
    },
    created: function () {
        this.fetchTermsData();
        //this.fetchData();
    },

    watch: {
        currentTerm: function (termID) {
            this.currentTerm = termID;
            this.fetchData();

        }
    },

    filters: {
        formatDate: function (v) {
            return v.replace(/T|Z/g, ' ');
        },
        hostName: function (v) {
            var getLocation = function(href) {
                var l = document.createElement("a");
                l.href = href;
                return l;
            };
            var l = getLocation(v);

            return l.hostname;
        },
        clearBit:function (v) {
            var getLocation = function(href) {
                var l = document.createElement("a");
                l.href = href;
                return l;
            };
            var l = getLocation(v);
            return 'https://logo.clearbit.com/' + l.hostname;
        }
    },

    methods: {
        // fetch posts
        fetchData: function () {
            var xhr = new XMLHttpRequest();
            var self = this;
            $uri = self.root + self.wpasset + '&type=' + self.currentTerm.id;
            xhr.open('GET', $uri);
            xhr.onload = function () {
                //console.log(xhr.responseText , $uri);
                try{
                    self.assets_posts = JSON.parse(xhr.responseText);
                } catch (e){
                    console.log(xhr.responseText)
                }
                self.showMobileMenu = false;
                jQuery('.cie-logo').each(function(){
                    jQuery(this).on('error', function(){
                        jQuery(this).attr({src: 'https://logo.clearbit.com/http.cat/'});
                    });
                });

            };
            xhr.send();
        },
        fetchTermsData: function () {
            var xhr = new XMLHttpRequest();
            var self = this;
            xhr.open('GET', self.root + self.terms_route);
            xhr.onload = function () {
                try{
                    self.terms = JSON.parse(xhr.responseText);
                    self.currentTerm = self.terms[0];
                    self.fetchData();
                } catch (e){
                    console.warn(e);
                }


            };
            xhr.send();

        }
    }
});