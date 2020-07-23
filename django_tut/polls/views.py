from django.shortcuts import render
from django.http import HttpResponse, Http404, HttpResponseRedirect
from .models import Choice, Question
from django.template import loader
from django.shortcuts import render, get_object_or_404
from django.urls import reverse
from django.views import generic

# Create your views here.

class IndexView(generic.ListView):
    template_name = 'polls/index.html'
    context_object_name = 'qlist'
    
    def get_queryset(self):
        return Question.objects.order_by('id')

class DetailView(generic.DetailView):
    template_name = 'polls/detail.html'
    model = Question


class ResultsView(generic.DetailView):
    template_name = 'polls/results.html'
    model = Question

#obsolete

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

def vote(request, question_id):
    print(type(question_id))
    question = get_object_or_404(Question, pk=question_id)
    try:
        selected_choice = question.choice_set.get(pk=request.POST["choice"])
    except (KeyError, Choice.DoesNotExist):
        return render(request, 'polls/detail.html', {'question':question, 'error_message':"You didn't select a choice."})
    else:
        selected_choice.votes += 1
        selected_choice.save()
        return HttpResponseRedirect(reverse('polls:results', args=(question_id,)))

def results(request, question_id):
    print(type(question_id))
    question = get_object_or_404(Question, pk=question_id)
    return render(request, 'polls/results.html', {'question':question})
