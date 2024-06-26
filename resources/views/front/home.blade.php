<x-front.master>
    <x-front.carousel />
    <x-front.about />
    <x-front.articles :articles="$articles" />
    <x-front.requests :donationRequests="$donationRequests" :bloodTypes="$bloodTypes" :cities="$cities"/>
    <x-front.contact />
    <x-front.app />

</x-front.master>
