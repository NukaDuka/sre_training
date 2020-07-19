from django.shortcuts import render
from django.http import HttpResponse

# Create your views here.
def index(request):
    return HttpResponse('Hello world')



def secret(request):
    secret.i += 1
    return HttpResponse('The secret code is ' + str(secret.i))

secret.i = 0
