from django.test import TestCase
import datetime
from django.utils import timezone

from .models import Question

class QuestionModelTests(TestCase):
    def test_was_published_recently_with_future_question(self):
        date = timezone.now() + datetime.timedelta(days=30)
        future_q = Question(pub_date=date)
        self.assertIs(future_q.was_published_recently(), False)

# Create your tests here.
