
            
           
        </div>
    </div>
    <script>

    document.querySelector('#people').onclick = people;
    document.querySelector('#posts').onclick = posts;

    function people(){
        document.querySelector('#people').style.opacity = 1;
        document.querySelector('#posts').style.opacity = 0.5;
        document.querySelector('#box2').style.display = 'none';
        document.querySelector('#box1').style.display = 'block';
    }

    function posts(){
        document.querySelector('#posts').style.opacity = 1;
        document.querySelector('#people').style.opacity = 0.5;
        document.querySelector('#box1').style.display = 'none';
        document.querySelector('#box2').style.display = 'block';
    }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>