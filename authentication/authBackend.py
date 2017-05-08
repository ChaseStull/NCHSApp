from django.conf import settings
from django.shortcuts import render, HttpResponseRedirect
from django.contrib.auth.hashers import check_password, make_password
from . models import AppUser


class BasicUserBackend(object):

    def authenticate(self, request, username=None, password=None):
        userValid = False
        for u in AppUser.objects.all() and userValid is not True:
            if(username == u.username):
                if(make_password(password) == u.password):
                    userValid = True
                    return render(request, 'authentication/index.html', {"eMessage": "Success"})
        if not userValid:
            return render(request, 'authentication/index.html', {"eMessage": "Check your username & password"})

    def newUser(self, request, username=None, password=None, password_confirm=None, email=None, firstName=None, lastName=None):
        for u in AppUser.objects.all():
            if(username == u.username):
                return render(request, 'authentication/index.html', {"eMessage": "That user already exists"})
            else:
                if(password == password_confirm):
                    NewUser = AppUser(username=username, password=make_password(password), email=email, firstName=firstName, lastName=lastName)
                    NewUser.save()
                    return HttpResponseRedirect('../../')
                else:
                    return render(request, 'authentication/index.html', {"eMessage": "Passwords didn't match"})

