@include('components.be.meta')
@include('components.be.loading')
<div id="main-wrapper">
    @include('components.be.header')
    @include('components.be.sidebar')
    <div class="page-wrapper">
        @yield('content')
        <div class="loading">
            <div class="loading-content text-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Please Wait, Loading...</span>
                </div>
            </div>
        </div>
        <footer class="footer text-center">
            All Rights Reserved by NgaoduVietNam
        </footer>
    </div>
</div>
@include('components.be.script')