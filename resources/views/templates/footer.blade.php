<footer>
    <ul>
        <li><a href="{{ route('plan.index') }}">ホームへ</a></li>
        <li><a href="{{ route('about') }}">このサイトについて</a></li>
        <li>Copyright 2019 haruya.work</li>
    </ul>
</footer>
<script>
    const $form = document.querySelector('form')
    if ($form != null) {
        $form.addEventListener('submit', function() {
            const $button = $form.querySelector('input[type=submit]')
            $button.setAttribute('disabled', 'disabled')
        })
    }
</script>