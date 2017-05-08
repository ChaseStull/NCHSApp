from django.db import models


class AppUser(models.Model):
    username = models.Value(None)
    password = models.Value(None)
    email = models.EmailField(max_length=100)
    firstName = models.CharField(max_length=100)
    lastName = models.CharField(max_length=100)

    def __str__(self):
        return self.username
