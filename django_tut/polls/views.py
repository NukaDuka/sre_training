from django.shortcuts import render
from django.http import HttpResponse, Http404
from .models import Question
from django.template import loader
from django.shortcuts import render

# Create your views here.
def index(request):
    qlist = Question.objects.order_by('id')
    context = {
                'qlist': qlist,
    }
    return render(request, 'polls/index.html', context)



def secret(request):
    secret.i += 1
    return HttpResponse('The secret code is ' + str(secret.i))

secret.i = 0

def detail(request, question_id):
    try:
        question = Question.objects.get(pk=question_id)
    except Question.DoesNotExist:
        raise Http404("Question does not exist")

    return render(request, 'polls/detail.html', {'question': question})

def results(request, question_id):
    return HttpResponse("You're looking at the results of question no. " + str(question_id))

def vote(request, question_id):
    return HttpResponse("You're now voting on question no. " + str(question_id))
