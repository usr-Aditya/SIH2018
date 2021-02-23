from django.conf.urls import url
from . import views

app_name = "psite"

urlpatterns = [
    url(r'^$', views.homepage, name="homepage"),
    url(r'^add/$', views.AddProject.as_view(), name="add-project"),
    url(r'^validate/(P<email_id>\w+|[\w.%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4})/$', views.validate_subscribe,
        name="validate_subscribe"),
    url(r'^subscribe/$', views.subscribe, name="subscribe"),
]
