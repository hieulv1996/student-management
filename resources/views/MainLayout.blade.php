<!doctype html>
<html lang="en">
    @include("components.HeadTag")
<body>
    @yield("layout")
    @include("components.ScriptLib")
    @stack('scripts')
</body>
</html>
