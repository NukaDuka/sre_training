from . import settings
from django.http import HttpResponse
from django.shortcuts import render
def homepage(request):
    context = {'apps':settings.USER_APPNAMES}
    return render(request, 'homepage.html', context)
