

@push('styles')
    <link href="{{asset('css/home/HomeSectionOne/HomeSectionOne.css')}}" >
    <link href="{{asset('css/home/HomeSectionOne/MainPost.css')}}" >
    <link href="{{asset('css/home/HomeSectionOne/SecondMainPost.css')}}" >
    <link href="{{asset('css/home/HomeSectionOne/ThirdMainPost.css')}}" >
@endpush

<div class="HomeSectionOne" >
    @include('website.home.HomeSectionOne.MainPost')
    @include('website.home.HomeSectionOne.SecondMainPost')
    @include('website.home.HomeSectionOne.ThirdMainPost')
</div>
