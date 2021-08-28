<div class="add-2 container" id="addPostNotes">
	<div class="singleContent">
		<h3> » اتفاقيه دفع عمولة موقع {{getSettings('siteName')}}   </h3>
		 
		<h1> بسم الله الرحمن الرحيم</h1>
		<h2>قال الله تعالي</h2>
		<p class="Qraan">
		    (
		    <span>
		      وَأَوْفُواْ بِعَهْدِ اللهِ إِذَا عَاهَدتُّمْ وَلاَ تَنقُضُواْ الأَيْمَانَ بَعْدَ تَوْكِيدِهَا وَقَدْ جَعَلْتُمُ اللهَ عَلَيْكُمْ كَفِيلاً
		    </span>
		    )
		    <span class="sora"> ] النحل : (91).</span>
		</p>
		<h2>وقال تعالي</h2>
		<p class="Qraan">
		    (
		    <span>
		       الذًين يوفون بعهد اللهِ وَلاَ يَنقُضُون الميثاق
		    </span>
		    )
		    <span class="sora">] الرعد: (20)</span>
		</p>
        
        
        
		<hr>
<!--        <div class="contact-mm">-->
<!--            <p>-->
<!--            أتعهد أنا المعلن أمام الله عز وجل أن أقوم بدفع عمولة الموقع وهي (<span>0.50%</span>)أي نصف جنيه في المئة جنيه مصري من قيمة السلعة في حال تم بيعها عن طريق-->
<!--موقع <span>سوق الصعيد</span> أو كان الموقع السبب في بيعها وأن هذه العمولة هي أمانة ال تخلو-->
<!--ذمتي منها إال بعد دفعها .-->
<!--            </p>-->
<!--            <p class="red">-->
<!--                ملاحظة: عمولة الموقع هي علي المعلن ولا تبرأ ذمة المعلن من العمولة إلا في حال دفعها , وأيضآ ذمة المعلن لاتبرأ من العمولة بمجرد ذكر أن العمولة علي المشتري في الإعلان .-->
<!--            </p>-->
<!--            <div class="onoffswitch">-->
<!--                <label class="switch">-->
<!--                  <input type="checkbox" >-->
<!--                  <span class="slider"></span>-->
<!--                </label>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="contact-mm">-->
<!--            <p>-->
<!--                أتعهد انا المعلن أن لدي النية الجادة في البيع وأن إعلاني ليس لمجرد معرفة سعر السلعة في السوق .-->
<!--            </p>-->
<!--            <div class="onoffswitch">-->
<!--                <label class="switch">-->
<!--                  <input type="checkbox" >-->
<!--                  <span class="slider"></span>-->
<!--                </label>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="contact-mm">-->
<!--            <p>-->
<!--            اتعهد انا المعلن ان جميع المعلومات التي سوف اذكرها بالاعلان صحيحه وفي القسم الصحيح وان الصور التي سوف يتم عرضها هي صور حديثه لنفس السلعه وليست لسلعه اخري.-->
<!--            </p>-->
<!--            <div class="onoffswitch">-->
<!--                <label class="switch">-->
<!--                  <input type="checkbox" >-->
<!--                  <span class="slider"></span>-->
<!--                </label>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="contact-mm">-->
<!--            <p>-->
<!--                أتعهد أنا المعلن أن أقوم بدفع العمولة في حال تم بيع السلعة أو خلال 10 أيام من أستلام قيمتها.-->
<!--            </p>-->
<!--            <div class="onoffswitch">-->
<!--                <label class="switch">-->
<!--                  <input type="checkbox" >-->
<!--                  <span class="slider"></span>-->
<!--                </label>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="contact-mm">-->
<!--            <p class="Qraan">-->
<!--                يقول الله عز وجل )-->
<!--                <span>-->
<!--                     وَتَعَاوَنُوا عَلَى الْبِرِّ وَالتَّقْوَىٰ ۖ وَلَا تَعَاوَنُوا عَلَى الْإِثْمِ وَالْعُدْوَانِ ۚ وَاتَّقُوا اللَّهَ ۖ إِنَّ اللَّهَ شَدِيدُ الْعِقَابِ-->
<!--                </span>-->
<!--                (-->
<!--                <span class="sora">المائدة</span>-->
<!--            </p>-->
<!--            <p>-->
<!--                أتعهد أنا المعلن أن لا أضع أي إعلان أو صور مخلة بالآداب و الأخلاق أو المحرمة شرعآ-->
<!--            </p>-->
<!--            <div class="onoffswitch">-->
<!--                <label class="switch">-->
<!--                  <input type="checkbox" >-->
<!--                  <span class="slider"></span>-->
<!--                </label>-->
<!--            </div>-->
<!--        </div>-->
		<form>
		@foreach($terms as $term)
			<label>
			<input type="checkbox" >
            {!!$term->content!!}
			</label>
			<br>
			<br>
        @endforeach
			<hr>
		</form>
		<button type="submit" id="goToStorePost" class="button  btn-lg btn-success">إستمرار »</button>
	</div>
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>

<script> 
    $("#goToStorePost").click(function (e) {
        if ($("[type=checkbox]").not(':checked')[0]){
            e.preventDefault();
            e.stopPropagation();
            alert('يجب تحديد جميع الحقول للمتابعة');

        }//end if
    });
</script>