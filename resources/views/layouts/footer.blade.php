<footer>
    <div class="footer">
        <p>copyright &copy; <span id="year"> </span> <a href="#">Vedev Developer</a> </p>
    </div>
</footer>

<script>
    let year = document.querySelector("#year");

    $(document).ready(function () {
        year.innerText = new Date().getFullYear();
    });
</script>