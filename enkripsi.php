<html>

<body>
    <?php
    include('js.php');
    session_start();
    ?>
    <script>
        function print(string) {
            document.write(string + "\n\n");
        }
        var PassPhrase = "<?php echo $_SESSION['touserpass'] ?>";
        var Bits = 512;

        var RSAkey = cryptico.generateRSAKey(PassPhrase, Bits);

        var PublicKeyString = cryptico.publicKeyString(RSAkey);

        var PlainText = "<?php echo $_SESSION['msg']; ?>";

        var EncryptionResult = cryptico.encrypt(PlainText, PublicKeyString);

        var temp1 = EncryptionResult.cipher;

        var DecryptionResult = cryptico.decrypt(temp1, RSAkey);

        window.location="http://localhost/simple-chat/buat.php?cipher="+EncryptionResult.cipher;
    </script>
</body>

</html>