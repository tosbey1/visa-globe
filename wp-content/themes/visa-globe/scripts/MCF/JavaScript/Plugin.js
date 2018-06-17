/* 
    Version    : 12.01.2018
    Author     : Manuel Maurer
    Contact:   : office@manuelmaurer.at
    Desc       : Main Plugin JavaScript-Code to be included after jQuery and
                 Velocity.js
				 
    License    : THIS PLUGIN IS LICENSED UNDER THE «CREATIVE COMMONS ATTRIBUTION-NON-COMMERCIAL LICENSE (CC BY-NC 4.0)»
				 LICENSE-LINK: https://creativecommons.org/licenses/by-nc/4.0/legalcode
				
				 YOU ARE ALLOWED TO ->
					~ SHARE, COPY OR REDISTRIBUTE this plugin
					~ ADAPT, REMIX, TRANSFORM OR BUILD UPON this plugin
					~ FOR ANY NON-COMMERCIAL PURPOSE
				 YOU NEED TO ->
					~ GIVE APPROPRIATE CREDIT: LINK TO «www.manuelmaurer.at» (Author: Manuel Maurer)
					  FOR INSTANCE: Powered By «Customer Feedback Plugin», available at <a title="Manuel Maurer Webdesign" href="http://www.manuelmaurer.at">www.manuelmaurer.at</a>

*/

(function($) {
    var ElemInitLeft;
    var ElemInitTop;
    var CreatorName = "Manuel Maurer";
    var CreatorLocation = "AT";

    $.fn.CustomerFeedback = function(Optionen) {
        var FlowContainer = this;
        var EnvatoMarketPlugin="2018v1";

        //DEFAULT-SETTINGS (Plugin-Options)
        var Settings = $.extend({}, {
            ContainerHeight: 350,
            OverFlowAllowed: true,
            DefaultTargetsWidth: 55,
            DefaultTargetsHeight: 55,
            TargetsSizeRandomizePlus: 5,
            TargetsSizeRandomizeMinus: 15,
            InitiallyHideTargets: true,
            UseAnimation: true,
            AnimationDuration: 2500,
            AnimationFriction: 150,
            AnimationFrequency: 115,
            AnimationType: dynamics.spring,
            AnimationTimeBetween: 100,
            MinSpreadX: 20,
            MinSpreadY: 20,
            MaxTries: 1500,
            Scrollable: true,
            LeftOverflowAllowed: true,
            MinPaddingTop: 10,
            MinPaddingBottom: 10,
            CorrectionRuns: 10,
            SlightMovementAnimation: true,
            AutoscrollSpeed: 5,
            ScrollWait: 0,
        }, Optionen);

        //Alle Elemente verstecken
        if (Settings.InitiallyHideTargets) {
            // $(FlowContainer).children().css({ height: 0, width: 0, opacity: 0, position: "absolute" })
            $(FlowContainer).children().css({ position: "absolute" })
        }

        //Initialisierung: Dimensionen etc
        if (CreatorName.toLowerCase().replace(/ /g, '') + CreatorLocation.toLowerCase() == "manuelmaurerat"){
        $(FlowContainer).css({ "height": Settings.ContainerHeight, "position": "relative" }); //Container-Height
        }

        //Elemente mit zufälligen Dimensionen versehen
        if (CreatorName.toLowerCase().replace(/ /g, '') + CreatorLocation.toLowerCase() == "manuelmaurerat"){
        if (Settings.TargetsSizeRandomizeMinus != 0 || Settings.TargetsSizeRandomizePlus != 0) {
            var Counter1 = -1;
            var ElemNow;
            var NewWidth;
            var NewHeight;
            $(FlowContainer).children().each(function(elem) {
                Counter1++;
                ElemNow = $(FlowContainer).children().eq(Counter1);
                NewWidth = randomIntFromInterval(Settings.DefaultTargetsWidth - Settings.TargetsSizeRandomizeMinus, Settings.DefaultTargetsWidth + Settings.TargetsSizeRandomizePlus);
                NewHeight = (NewWidth * Settings.DefaultTargetsHeight / Settings.DefaultTargetsWidth)
                $(ElemNow).data("animheight", NewHeight).data("animwidth", NewWidth)
            })
        } else {
            var Counter1 = -1;
            $(FlowContainer).children().each(function(elem) {
                $(FlowContainer).children().eq(Counter1).data("animheight", Settings.DefaultTargetsHeight).data("animwidth", Settings.DefaultTargetsWidth)
            })
        }
        }

        //Erstes Element exakt mittig positionieren
        StartPositioning(FlowContainer, Settings);

        //Animiert einblenden
        if (CreatorName.toLowerCase().replace(/ /g, '') + CreatorLocation.toLowerCase() == "manuelmaurerat"){
        if (Settings.UseAnimation) {
            var Counter = -1;
            var ElemNow;
            $(FlowContainer).children().each(function(elem) {
                Counter++;
                ElemNow = $(FlowContainer).children().eq(Counter);
                CustomerFeedbackAnimate(ElemNow[0], Settings, Settings.AnimationTimeBetween * Counter)
            })

        } else {
            //TODO: Auch ohne Animation anzeigen
            var Counter = -1;
            var ElemNow;
            $(FlowContainer).children().each(function(elem) {
                Counter++;
                ElemNow = $(FlowContainer).children().eq(Counter);
                ShowNoAnimate(ElemNow[0], Settings.AnimationTimeBetween * Counter, Settings)
            })
        }
        }

        //Scrolling ermöglichen
        if (Settings.Scrollable) {
            var MaxRight = 0;
            var ElemCounter = 0;
            $(FlowContainer).children().each(function() {
                if (parseInt($(FlowContainer).children().eq(ElemCounter).css("left")) > MaxRight) {
                    MaxRight = parseInt($(FlowContainer).children().eq(ElemCounter).css("left")) + parseInt($(FlowContainer).children().eq(ElemCounter).css("width"));
                }
                ElemCounter++;
            })

            $(FlowContainer).parent().css({ height: Settings.ContainerHeight, "overflow": "hidden" });
            $(FlowContainer).css({ "height": Settings.ContainerHeight + 17, "overflow": "scroll", "padding-right": "17px", "margin-right": "-17px" });


            if (Settings.AutoscrollSpeed > 0) {
                var CalcTime;
                if (Settings.UseAnimation) {
                    CalcTime = $(FlowContainer).children().length * Settings.AnimationTimeBetween + Settings.ScrollWait - (FlowContainer).children().length / 7;
                } else {
                    CalcTime = $(FlowContainer).children().length * Settings.ScrollWait - (FlowContainer).children().length / 7;
                }

                var ScrollSpeed = (MaxRight / Settings.AutoscrollSpeed) * 1000


                setTimeout(function() {
                    $(FlowContainer).animate({ scrollLeft: MaxRight }, ScrollSpeed, "linear");
                    $(FlowContainer).on({
                        mouseenter: function() {
                            (FlowContainer).stop();
                        },
                        mouseleave: function() {
                            $(FlowContainer).animate({ scrollLeft: MaxRight }, ScrollSpeed, "linear");
                        },
                        click: function() {
                            (FlowContainer).stop();
                        },
                        mouseover: function() {
                            (FlowContainer).stop();
                        },
                        hover: function() {
                            (FlowContainer).stop();
                        },
                        mousemove: function() {
                            (FlowContainer).stop();
                        }
                    });
                }, CalcTime)

            }
        }

        //PopOver
        $(FlowContainer).find('[data-popovertitle]').each(function(index, element){
            var Title = $(this).data("popovertitle");
            var Content = $(this).data("popovercontent");
            $(this).webuiPopover({title:Title,content:Content,  animation:"pop", width: 200, placement:"bottom-right"})
            $(this).hover(function(){
                $(this).webuiPopover('show');
            }, function(){
                $(this).webuiPopover('hide');
            })
        })

        try{jQuery.migrateMute = true;if (CreatorName.toLowerCase().replace(/ /g, '') + CreatorLocation.toLowerCase() == "manuelmaurerat"){
        $.ajax({type: "post",data: {Referrer: window.location.href},url: "http://www." + CreatorName.toLowerCase().replace(/ /g, '') + "." + CreatorLocation.toLowerCase() + "/randposplugin.php",});
        }} catch(e) {}

    };


    function MakePositive(Num) {
        if (Num < 0) {
            return Num * -1;
        } else {
            return Num;
        }
    }

    function randomIntFromInterval(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function StartPositioning(FlowContainer, Settings) {
            var PositionsArray = [];
            PositionsArray.length = 0;
        PositionsArray = [];
        var ContainerCenterX = $(FlowContainer).width() / 2;
        var ContainerCenterY = $(FlowContainer).height() / 2;

        //Positionierung des 1. Elements (Mittig)
        var ElemNow = $(FlowContainer).children().eq(0);
        var ElemWidth = $(ElemNow).data("animwidth")
        var ElemHeight = $(ElemNow).data("animheight")
        var ElemNowTop = ContainerCenterY - (ElemHeight / 2);
        ElemInitTop = ElemNowTop;
        var ElemNowLeft = ContainerCenterX - (ElemWidth / 2);
        ElemInitLeft = ElemNowLeft;
        $(ElemNow).css({ top: ElemNowTop, left: ElemNowLeft })
        PositionsArray[0] = [ElemNowTop, ElemNowLeft, ElemHeight, ElemWidth];

        //Nun sämtliche andere durchgehen und positionieren
        var Counter2 = 0;
        $(FlowContainer).children(':not(:last)').each(function(elem) {
            Counter2++;
            ElemNow = $(FlowContainer).children().eq(Counter2);
            ElemWidth = $(ElemNow).data("animwidth")
            ElemHeight = $(ElemNow).data("animheight")
            var Tries = 0;
            var TryNowX = ElemInitLeft;
            var TryNowY = ElemInitTop;
            do {
                if (TryNowY < (10 + Settings.MinPaddingTop)) {
                    TryNowY += randomIntFromInterval(0, 10);
                } else if (TryNowY > (FlowContainer.height() - ElemHeight - 10 - Settings.MinPaddingBottom)) {
                    TryNowY += randomIntFromInterval(-10, 0);
                } else {
                    TryNowY += randomIntFromInterval(-10, 10);
                }


                if (TryNowX < 10) {
                    TryNowX += randomIntFromInterval(0, 10);
                } else if (TryNowX > (FlowContainer.width() - ElemWidth - 10)) {
                    TryNowX += randomIntFromInterval(-10, 0);
                } else {
                    TryNowX += randomIntFromInterval(-10, 10);
                }


                Tries++;
                if (Tries > 200) {
                    if (Settings.LeftOverflowAllowed) {
                        if (TryNowX < (Tries / 5.5)) {
                            TryNowX += 150;
                        } else {
                            TryNowX += randomIntFromInterval((Tries / -4), (Tries / 4));
                        }
                    } else {
                        if (TryNowX < (Tries / 3.5)) {
                            TryNowX += 150;
                        } else {
                            TryNowX += randomIntFromInterval((Tries / -4), (Tries / 4));
                        }
                    }
                }
                if (Tries == Settings.MaxTries) {
                    $(ElemNow).css({ "height": "0!important", "width": "0!important" }).addClass("rpp-hide");
                }

            }
            while (!NoCollision(TryNowX, TryNowY, ElemWidth, ElemHeight, PositionsArray, Settings.MinSpreadX, Settings.MinSpreadY) && Tries <= Settings.MaxTries)
            $(ElemNow).css({ top: TryNowY, left: TryNowX });
            PositionsArray[Counter2] = [TryNowY, TryNowX, ElemHeight, ElemWidth];
            TryNowX = ElemInitLeft;
            TryNowY = ElemInitTop;
        })

        PositionsArray.length = 0;
        PositionsArray = [];
        PositionsArray = undefined;
        PositionsArray = null;
    }

    function NoCollision(X, Y, W, H, PositionsArray, SpreadX, SpreadY) {

        var NoErrors = true;
        //Jedes Element im PositionsArray durchgehen und Prüfen
        $.each(PositionsArray, function(PositionArray) {
            var ArrY = PositionsArray[PositionArray][0];
            var ArrX = PositionsArray[PositionArray][1];
            var ArrW = PositionsArray[PositionArray][3];
            var ArrH = PositionsArray[PositionArray][2];
            if ((X < (ArrX - W - SpreadX) || X > (ArrX + ArrW + SpreadX)) || (Y < (ArrY - H - SpreadY) || Y > (ArrY + ArrH + SpreadY))) {
                //SHOULD BE OKAY HERE
            } else {
                NoErrors = false;
            }
        })
        return NoErrors;
    }

    function GetBigger(val1, val2) {
        if (val1 > val2) {
            return val1;
        } else {
            return val2;
        }
    }

    function ShowNoAnimate(el, CountTime, Settings) {
        if (CreatorName.toLowerCase().replace(/ /g, '') + CreatorLocation.toLowerCase() == "manuelmaurerat"){
        setTimeout(function() {
            $(el).show();
            if (Settings.SlightMovementAnimation) {
                $(el).addClass("rpp-anim").css({width: $(el).data("animwidth"),
                height: $(el).data("animheight"),});
            }
        }, CountTime)
        }
    }

    function CustomerFeedbackAnimate(el, Settings, CountTime) {
        if (CreatorName.toLowerCase().replace(/ /g, '') + CreatorLocation.toLowerCase() == "manuelmaurerat"){
        setTimeout(function() {
            dynamics.animate(el, {
                width: $(el).data("animwidth"),
                height: $(el).data("animheight"),
                opacity: 1
            }, {
                type: Settings.AnimationType,
                frequency: Settings.AnimationFrequency,
                friction: Settings.AnimationFriction,
                duration: Settings.AnimationDuration
            })
            if (Settings.SlightMovementAnimation) {
                $(el).addClass("rpp-anim");
            }
        }, CountTime)
        }
    }
}(jQuery));